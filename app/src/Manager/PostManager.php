<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("select * from Post");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Post($data);
        }

        return $users;
    }

    public function getPostById(int $id): ?Post
    {
        $query = $this->pdo->prepare("SELECT * FROM Post WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new Post($data);
        }

        return null;
    }

    public function insertPost(Post $post)
    {
        $query = $this->pdo->prepare("INSERT INTO Post (title, content, author) VALUES(:title, :content, :author)");
        $query->bindValue("title", $post->getTitle(), \PDO::PARAM_STR);
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue("author", $post->getAuthor(), \PDO::PARAM_INT);
        $query->execute();
    }

    public function createPost(string $title, string $content, int $author): Post
    {
        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);
        $post->setAuthor($author);
        $this->insertPost($post);

        return $post;
    }

    public function deletePost(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM Post WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_INT);
        $query->execute();
    }

    public function updatePost(Post $post)
    {
        $query = $this->pdo->prepare("UPDATE Post SET content = :content, author = :author, title = :title WHERE id = :id");
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue("title", $post->getTitle(), \PDO::PARAM_STR);
        $query->bindValue("author", $post->getAuthor(), \PDO::PARAM_INT);
        $query->bindValue("id", $post->getId(), \PDO::PARAM_INT);
        $query->execute();
    }

    public function updatePostById(int $id, string $content, int $author, string $title)
    {
        $post = $this->getPostById($id);
        $post->setContent($content);
        $post->setAuthor($author);
        $post->setTitle($title);
        $this->updatePost($post);
    }

    public function getPostByAuthor(int $author): ?Post
    {
        $query = $this->pdo->prepare("SELECT * FROM Post WHERE author = :author");
        $query->bindValue("author", $author, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new Post($data);
        }

        return null;
    }

    public function getPostByContent(string $content): ?Post
    {
        $query = $this->pdo->prepare("SELECT * FROM Post WHERE content = :content");
        $query->bindValue("content", $content, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new Post($data);
        }

        return null;
    }

    public function getPostByAuthorAndContent(int $author, string $content): ?Post
    {
        $query = $this->pdo->prepare("SELECT * FROM Post WHERE author = :author AND content = :content");
        $query->bindValue("author", $author, \PDO::PARAM_INT);
        $query->bindValue("content", $content, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new Post($data);
        }

        return null;
    }
}
