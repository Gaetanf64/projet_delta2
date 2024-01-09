<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= local . "public/css/bootstrap.min.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/style.css" ?> />
    <link rel="icon" href=<?= local . "public/favicon.png" ?> />
    <title><?= $title ?></title>
</head>

<body>

    <header>  
        <nav class="navbar fixed-top navbar-expand-lg mx-auto">
            <div class="container-fluid container">
                <a href=<?= local . "./" ?> class="navbar-brand">DELTA2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item"><a href=<?= local . "./" ?> class="nav-link">Accueil</a></li>
                        <li class="nav-item"><a href=<?= local . "import" ?> class="nav-link">Import</a></li>
                        <li class="nav-item"><a href=<?= local . "exigence/data" ?> class="nav-link">Data</a></li>
                    </ul>
                </div>
            </div>
        </nav>  
    </header>