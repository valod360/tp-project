<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlaneSearch</title>
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme/min.css" />
</head>

<body>
    <header>
        <nav class="menu-burger">
            <ul>
                <li><a href="/accueil" title="Accueil">Accueil</a></li>
            </ul>
            <ul class="horizontalList">
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="/profil">Profil</a></li>
                    <li><a href="/réservation-perso">Mes avions reservé</a></li>
                    <li><a href="/réservation">Reservé un avion</a></li>
                    <li><a href="/deconnexion">Deconnexion</a></li>
                <?php } else { ?>
                    <li><a href="/connexion" title="Connexion">Connexion</a></li>
                    <li><a href="/inscription" title="Inscription">Inscription</a></li>
                <?php } ?>

            </ul>
        </nav>
    </header>
    <main>