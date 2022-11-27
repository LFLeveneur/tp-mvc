<?php /** @var App\Entity\User $user */ ?>

<style>
    html,
    body {
        height: 100%;
        width: 100%;
    }
    body {
        display: flex;
        align-items: center;
        padding: 40px;
        background-color: #f5f5f5;
    }
    main {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
</style>
<main class="form-signin w-100 m-auto">
    <form method="post" action="/login">
        <h1 class="h3 mb-3 fw-normal">Please login</h1>

        <div class="form-floating">
            <input type="user" name="username" class="form-control" id="floatingInput" placeholder="user">
            <label for="floatingInput">User</label>
        </div>
        <div class="form-floating mb-5">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" name="submit">Sign in</button>
        <button class="w-100 btn btn-lg btn-secondary"><a href="/register" style="text-decoration: none; color: #fff;">Register</a></button>
        <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
    </form>
</main>