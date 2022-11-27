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
    <form method="POST" action="/register">
        <h1 class="h3 mb-3 fw-normal">Please register</h1>

        <div class="form-floating">
            <input type="user" name="firstName" class="form-control" id="floatingInput" placeholder="firstName">
            <label for="floatingInput">First name</label>
        </div>
        <div class="form-floating">
            <input type="user" name="lastName" class="form-control" id="floatingInput" placeholder="lastName">
            <label for="floatingInput">Last name</label>
        </div>
        <div class="form-floating">
            <input type="user" name="gender" class="form-control" id="floatingInput" placeholder="gender">
            <label for="floatingInput">Gender</label>
        </div>
        <div class="form-floating">
            <input type="user" name="username" class="form-control" id="floatingInput" placeholder="user">
            <label for="floatingInput">User</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" name="passwordConfirm" class="form-control" id="floatingPassword" placeholder="Password repeat">
            <label for="floatingPassword">Password repeat</label>
        </div>
        <br/>
        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" name="submit">Sign in</button>
        <button class="w-100 btn btn-lg btn-secondary"><a href="/login" style="text-decoration: none; color: #fff;">Login</a></button>
        <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
    </form>
</main>