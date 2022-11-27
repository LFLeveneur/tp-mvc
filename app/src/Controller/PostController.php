<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{
    /*
     *
     * FUNCTION TO CREATE A POST (DISPLAY THE FORM)
     *
     * */

    #[Route('/post/new', name: 'newPost', methods: ['GET'])]
    public function newPost()
    {
        $this->render('posts/newPost.php');
    }

    /*
     *
     * FUNCTION TO CREATE A POST (FUNCTION)
     *
     * */

    #[Route('/post/create', name: 'createPost', methods: ['POST'])]
    public function createPost()
    {
        $manager = new PostManager(new PDOFactory());

        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = 1; //$_SESSION['user']->getByUsername();
        $post = $manager->createPost($title, $content, $author);
        $id = $post->getId();

        $this->redirect('/post/{id}', ['id' => $id]);
    }

    /*
     *
     * FUNCTION TO DISPLAY A POSTS
     *
     * */
    #[Route('/posts', name: 'posts')]
    public function allPost()
    {
        $postManager = new PostManager(new PDOFactory());
        $userManager = new UserManager(new PDOFactory());

        $posts = $postManager->getAllPosts();
        $users = $userManager->getAllUsers();

        $this->render('posts/allPost.php', [
            'posts' => $posts,
            'users' => $users
        ]);
    }

    #[Route('/post/{id}', name: "postPage", methods: ["GET"])]
    public function postPage(int $id)
    {
        $manager = new PostManager(new PDOFactory());
        $post = $manager->getPostById($id);

        $this->render("posts/post.php", [
            "post" => $post
        ], $post->getTitle());
    }


    /*
     *
     * FUNCTION TO EDIT A POST ( SHOW, EDIT, UPDATE, DELETE )
     *
     * */

    #[Route('/post/{id}/edit', name: "editPostPage", methods: ["GET"])]
    public function show()
    {
        $manager = new PostManager(new PDOFactory());
        $post = $manager->getPostById(1);

        $this->render("posts/post.php", [
            "post" => $post
        ], $post->getTitle());
    }

    #[Route('/post/{id}/edit', name: "editPost", methods: ["PUT"])]
    public function update()
    {
        $manager = new PostManager(new PDOFactory());
        $post = $manager->updatePost(1, "Mon titre", "Mon contenu");

        $this->render("posts/post.php", [
            "post" => $post
        ], $post->getTitle());
    }

    #[Route('/post/{id}/edit', name: "editPost", methods: ["DELETE"])]
    public function delete()
    {
        $manager = new PostManager(new PDOFactory());
        $manager->deletePost(1);
    }

    #[Route('/post/{id}/edit', name: "editPost", methods: ["PATCH"])]
    public function edit()
    {
        $manager = new PostManager(new PDOFactory());
        $post = $manager->getPostById(1);

        $this->render("post/edit.php", [
            "post" => $post
        ], $post->getTitle());
    }

}