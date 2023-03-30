<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /accueil');
    exit();
}


require_once '../models/database.php';
require_once '../config.php';
require_once '../models/userModel.php';









require_once '../views/parts/header.php';
require_once '../views/reservation.php';
require_once '../views/parts/footer.php';
