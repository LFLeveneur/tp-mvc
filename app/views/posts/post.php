<?php
/** @var App\Entity\User $user */
/** @var App\Entity\Post[] $posts */
/** @var App\Route\Route $router */

var_dump($user);
var_dump($posts);
var_dump($router);
var_dump($post);
?>

<main>
    <h1>Posts</h1>
    <div class="posts">
        <div class="post">
            <h2><?= $post->getContent(); ?></h2>
            <p>By <?= $post->getAuthor()->getUsername(); ?></p>
        </div>
    </div>

    <!--<a href="<?/*= $router->generate('createPost'); */?>">Create post</a>
    <a href="<?/*= $router->generate('logout'); */?>">Logout</a>-->
</main>
