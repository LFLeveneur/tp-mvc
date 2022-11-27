<?php /** @var App\Entity\User $user */ ?>
<h1><?= $username; ?></h1>

<?php
/* var_dump the SESSION */
var_dump($_SESSION);
echo "<br><br><br>";
/* var_dump the SESSION username */
/*array(1) { ["user"]=> object(App\Entity\User)#16 (8) { ["id":"App\Entity\User":private]=> int(2) ["username":"App\Entity\User":private]=> string(5) "Admin" ["password":"App\Entity\User":private]=> string(60) "$2y$10$CyTHdvw6.kBo/K1kGbehOeaZEfd0079oMkTFovVI5BEr/vLpJJPRK" ["email":"App\Entity\User":private]=> string(25) "louisf.leveneur@gmail.com" ["firstName":"App\Entity\User":private]=> string(5) "Louis" ["lastName":"App\Entity\User":private]=> string(8) "Leveenur" ["gender":"App\Entity\User":private]=> string(1) "H" ["roles":"App\Entity\User":private]=> string(9) "ROLE_USER" } }*/
var_dump($_SESSION['user']->getUsername());
var_dump($_SESSION['user']->getRoles());
echo $_SESSION['user']->getUsername();
?>

<style>
    body{
        margin-top:20px;
        background:#f8f8f8
    }
</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">

                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $_SESSION['user']->getUsername(); ?></h4>
                                            <p class="mb-0"><?= $_SESSION['user']->getEmail(); ?></p>
                                            <div class="text-muted"><small><?= $_SESSION['user']->getRoles(); ?></small></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form class="form" novalidate="" method="PATCH" action="/profile">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="user" name="firstName" class="form-control" id="floatingInput" placeholder="firstName" value="<?= $_SESSION['user']->getFirstName(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="user" name="lastName" class="form-control" id="floatingInput" placeholder="lastName" value="<?= $_SESSION['user']->getLastName(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="user" name="username" class="form-control" id="floatingInput" placeholder="user" value="<?= $_SESSION['user']->getUsername(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Gender</label>
                                                                <input type="user" name="gender" class="form-control" id="floatingInput" placeholder="gender" value="<?= $_SESSION['user']->getGender(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $_SESSION['user']->getEmail(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mb-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="px-xl-3">
                                <button class="btn btn-block btn-secondary">
                                    <i class="fa fa-sign-out"></i>
                                    <a href="/logout" style="color: white; text-decoration: none"><span>Logout</span></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--SOURCE: https://www.bootdey.com/snippets/view/bs4-edit-profile-page#css-->