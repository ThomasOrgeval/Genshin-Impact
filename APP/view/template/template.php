<!DOCTYPE html>
<html lang="fr">
<head>
    <?php if ($_SERVER['HTTP_HOST'] === 'localhost') : ?>
        <base href="/Genshin-impact/APP/">
    <?php else :
        define('BASE_URL', 'https://genshin.thomasorgeval.fr/'); ?>
        <base href="<?= BASE_URL ?>">
    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Genshin Impact API' ?></title>
    <link rel="shortcut icon" type="image" href="./resources/images/logo.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet">

    <!--link href="resources/style/black.css" rel="stylesheet"-->
    <link href="resources/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="">
            <img src="resources/images/logo.png" height="22" alt="logo" loading="lazy" style="margin-top: -3px;" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active"><a class="nav-link" aria-current="page" href="">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="resource">My resources</a></li>
            </ul>

            <ul class="navbar-nav d-flex flex-row">
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

<div id="content" class="container">
    <?= $content ?>
</div>
</body>

<footer class="bg-light text-lg-start">
    <div class="text-center py-4 align-items-center">
        <p>Mes différents médias</p>
        <a href="https://lexiquejaponais.fr" class="btn btn-primary m-1" rel="nofollow" target="_blank" role="button">
            <i class="fas fa-dragon"></i>
        </a>
        <a href="https://github.com/ThomasOrgeval" class="btn btn-primary m-1" role="button" rel="nofollow"
           target="_blank">
            <i class="fab fa-github"></i>
        </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:<a class="text-dark" target="_blank" href="https://thomasorgeval.fr/">Thomas Orgeval</a>
    </div>
    <!-- Copyright -->
</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<!-- MDB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- JS Cookie -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

<script src="resources/script.js"></script>
</html>