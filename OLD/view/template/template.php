<!DOCTYPE html>
<html lang="en">
<head>
    <?php if ($_SERVER['HTTP_HOST'] === 'localhost') : ?>
        <base href="/Genshin-impact/APP/">
    <?php else :
        define('BASE_URL', 'https://genshin.thomasorgeval.fr/'); ?>
        <base href="<?= BASE_URL ?>">
    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This site allows you to know how many resources you need to improve a character
    as well as calculations based on Genshin Impact">

    <meta property="og:title" content="Genshin API">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://genshin.thomasorgeval.fr">
    <meta property="og:image" content="https://genshin.thomasorgeval.fr/resources/images/elements/sm/All.png">
    <meta property="og:description" content="This site allows you to know how many resources you need to improve a
    character as well as calculations based on Genshin Impact">

    <title><?= $title ?? 'Genshin Impact API' ?></title>
    <link rel="shortcut icon" type="image" href="resources/images/elements/sm/All.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet">

    <!--link href="resources/style/black.css" rel="stylesheet"-->
    <link href="resources/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand me-0" href="">
            <img src="resources/images/elements/All.png" height="22" alt="logo" style="margin-top: -3px">
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar1"
                aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active"><a class="nav-link" aria-current="page" href="">Home</a></li>
                <?php if (isset($_SESSION['Account'])) : ?>
                    <li class="nav-item"><a class="nav-link" href="resource">My resources</a></li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav d-flex flex-row">
                <?php if (isset($_SESSION['Account'])) : ?>
                    <li id="logout" class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="index.php?p=signOut">Sign out</a>
                    </li>

                    <?php if (isset($_POST['queue'])) : ?>
                        <li id="queue" class="nav-item me-3 me-lg-0">
                            <div class="dropdown">
                                <a class="nav-link" role="button" id="queueList" data-mdb-toggle="dropdown"
                                   aria-expanded="false"><i class="fas fa-folder"></i></a>
                                <ul class="dropdown-menu dropdown-menu-md-end bg-dark"
                                    aria-labelledby="queueList" style="width: 250px">
                                    <li class="d-flex justify-content-evenly faded-dark">
                                        <a href="queue">
                                            <i class="far fa-eye text-white" style="font-size: 180%"></i>
                                        </a>
                                        <?php if (completeQueue($_SESSION['Account']['mail'])) : ?>
                                            <a href="queue_complete" class="click">
                                                <i class="fas fa-check text-success" style="font-size: 180%"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a onclick="clearQueue()" class="click">
                                            <i class="fas fa-times text-danger" style="font-size: 180%"></i>
                                        </a>
                                    </li>
                                    <hr class="m-0">
                                    <?php foreach ($_POST['queue'] as $item) : ?>
                                        <li class="d-flex faded-dark" style="height: 50px">
                                            <img src="resources/images/items/sm/<?= slug(getItem($item['item'])['label']) . $item['level_item'] ?>.png"
                                                 alt="item" style="height: 50px">
                                            <div class="row w-100 my-auto">
                                                <span class="col text-center text-white-50"><?= $item['amount'] ?></span>
                                                <span class="col text-center text-white-50">
                                                    <?= getValue($item['item'], $item['level_item']) ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endif;

                else : ?>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="" data-mdb-toggle="modal" data-mdb-target="#signIn">Sign In</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://lexiquejaponais.fr" rel="nofollow" target="_blank">
                        <i class="fas fa-dragon"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://github.com/ThomasOrgeval" rel="nofollow" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="signIn" tabindex="-1" aria-labelledby="signIn" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark">
            <div class="modal-body p-4">
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="mdb-tab-login" data-mdb-toggle="pill" href="#pills-login"
                           role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="mdb-tab-register" data-mdb-toggle="pill" href="#pills-register"
                           role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="pills-login" role="tabpanel"
                         aria-labelledby="mdb-tab-login">
                        <form method="post" action="index.php?p=signIn">

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="loginMail" name="mail"
                                       class="form-control bg-dark text-white-50" required>
                                <label class="form-label bg-dark text-white-50" for="loginMail">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="loginPassword" name="pass"
                                       class="form-control bg-dark text-white-50" required>
                                <label class="form-label bg-dark text-white-50" for="loginPassword">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                            <!-- Register buttons -->
                            <!--div class="d-flex justify-content-between justify-content-md-around">
                                <a href="#!">Forgot password?</a>
                                <div>
                                    <p>Not a member?
                                        <a data-mdb-toggle="pill" href="#pills-register" role="tab"
                                           aria-controls="pills-register" aria-selected="false">Register</a>
                                    </p>
                                </div>
                            </div-->
                        </form>
                    </div>

                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="mdb-tab-register">
                        <form method="post" action="index.php?p=signUp">

                            <!-- Pseudo input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerPseudo" name="pseudo"
                                       class="form-control bg-dark text-white-50" required>
                                <label class="form-label bg-dark text-white-50" for="registerPseudo">Pseudo</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="registerEmail" name="mail"
                                       class="form-control bg-dark text-white-50" required>
                                <label class="form-label bg-dark text-white-50" for="registerEmail">Email</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="registerPassword" name="pass" autocomplete="new-password"
                                       class="form-control bg-dark text-white-50" minlength="8" required>
                                <label class="form-label bg-dark text-white-50" for="registerPassword">Password (8
                                    Characters min)</label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-1">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="container">
    <?= flash() ?>
    <?= $content ?>
</div>
</body>

<footer class="bg-dark text-lg-start">
    <div class="text-center py-4 align-items-center" style="background-color: rgba(0, 0, 0, 0.2);">
        <p>My different media</p>
        <a href="https://lexiquejaponais.fr" class="btn btn-primary m-1" rel="nofollow" target="_blank" role="button">
            <i class="fas fa-dragon"></i>
        </a>
        <a href="https://github.com/ThomasOrgeval" class="btn btn-primary m-1" role="button" rel="nofollow"
           target="_blank">
            <i class="fab fa-github"></i>
        </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3 faded-dark">
        © 2021 Copyright:<a class="text-white-50" target="_blank" href="https://thomasorgeval.fr/">Thomas & Léo
            Orgeval</a>
    </div>
    <!-- Copyright -->
</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
<!-- MDB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>

<script src="resources/script.js"></script>
</html>