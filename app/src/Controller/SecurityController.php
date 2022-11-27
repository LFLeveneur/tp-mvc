<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {
        $formUsername = $_POST['username'];
        $formPwd = $_POST['password'];

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($formUsername);

        if (!$user) {
            header("Location: /?error=user_not_found");
            exit;
        }

        if ($user->passwordMatch($formPwd)) {
            $_SESSION['user'] = $user;

            $this->render("users/profile.php", [
                "username" => $formUsername
            ],
                "titre de la page");
        }

        header("Location: /?error=notfound");
        exit;
    }

    #[Route('/register', name: "register", methods: ["POST"])]
    public function register()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $regexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/";
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];

        if ($password !== $passwordConfirm) {
            header("Location: /register?error=password_not_match");
            exit;
        }

        if (!preg_match($regexPassword, $password)) {
            header("Location: /register?error=password_not_strong");
            exit;
        }

        if (strlen($username) < 3) {
            header("Location: /register?error=username_too_short");
            exit;
        }

        if (strlen($username) > 255) {
            header("Location: /register?error=username_too_long");
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /register?error=usermail_not_valid");
            exit;
        }

        if (strlen($email) < 3) {
            header("Location: /register?error=usermail_too_short");
            exit;
        }

        if (strlen($email) > 255) {
            header("Location: /register?error=usermail_too_long");
            exit;
        }

        if (strlen($firstName) < 3) {
            header("Location: /register?error=firstName_too_short");
            exit;
        }

        if (strlen($firstName) > 255) {
            header("Location: /register?error=firstName_too_long");
            exit;
        }

        if (strlen($lastName) < 3) {
            header("Location: /register?error=lastName_too_short");
            exit;
        }

        if (strlen($lastName) > 255) {
            header("Location: /register?error=lastName_too_long");
            exit;
        }

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($username);

        if ($user) {
            header("Location: /register?error=alreadyexist");
            exit;
        }

        $userManager->createUser($username, $email, $password, $firstName, $lastName, $gender);

        header("Location: /login");
        exit;
    }

    #[Route('/logout', name: "logout", methods: ["GET"])]
    public function logout()
    {
        session_destroy();
        header("Location: /");
        exit;
    }
    /*
        #[Route('/profile', name: "profile", methods: ["GET"])]
        public function profile()
        {
            $this->render("users/profile.php", [
                "username" => $_SESSION['user']->username
            ], "Profil");
        }

        #[Route('/profile', name: "updateProfile", methods: ["PATCH"])]
        publicunction updateProfile()
        {
            /*$username = $_SESSION['user']->username;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            $regexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/";
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $gender = $_POST['gender'];

            var_dump($username);
            var_dump($email);
            var_dump($password);
            var_dump($passwordConfirm);
            var_dump($firstName);
            var_dump($lastName);
            var_dump($gender);
            die();
    }*/
}
