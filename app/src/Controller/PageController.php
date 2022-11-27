<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PageController extends AbstractController
{
    #[Route('/', name: "homePage", methods: ["GET"])]
    public function homePage()
    {
        $manger = new PostManager(new PDOFactory());
        $posts = $manger->getAllPosts();

        $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "je suis une string",
            "machin" => 42
        ], "Tous les posts");
    }

    #[Route('/register', name: "registerPage", methods: ["GET"])]
    public function registerPage()
    {
        $this->render("security/register.php", [], "Inscription");
    }

    #[Route('/login', name: "loginPage", methods: ["GET"])]
    public function loginPage()
    {
        $this->render("security/login.php", [], "Connection");
    }

    #[Route('/profile', name: "profilePage", methods: ["GET"])]
    public function profilePage()
    {
        $manager = new UserManager(new PDOFactory());
        $this->render("users/profile.php", [
            "username" => 'test'
        ], "Profil");
    }
}
