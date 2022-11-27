<?php
/** @var App\Entity\User $user */
/** @var App\Entity\Post[] $posts */
/** @var App\Route\Route $router */
?>

<main>
    <h1>Create posts</h1>
    <form action="/post/create" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <input type="text" name="content" placeholder="Content">
        <input type="submit" value="Create">
    </form>
</main>
