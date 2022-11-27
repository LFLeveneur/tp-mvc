<?php
/** @var App\Entity\User $user */
/** @var App\Entity\Post[] $posts */
?>

<main>
    <h1>Posts</h1>
    <div class="posts">
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <h2><?= $post->getContent(); ?></h2>
                <p>By <?= $post->getAuthor()->getUsername(); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>

