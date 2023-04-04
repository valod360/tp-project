<?php

if(!isset($_SESSION['user'])){
    header('Location: accueil');
    exit();
}

require_once '../models/database.php';








require_once '../views/parts/header.php';
require_once '../views/userProfil.php';
require_once '../views/parts/footer.php';