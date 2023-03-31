<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /accueil');
    exit();
}


require_once '../models/database.php';
require_once '../models/userModel.php';
require_once '../models/reservationModel.php';
require_once '../config.php';

setlocale(LC_TIME, 'fr_FR.utf8');
$res = new reservation;
$res->id_user = $_SESSION['user']['id'];

$result = $res->seeLoan();



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	var_dump("Le bouton a été cliqué");
}



require_once '../views/parts/header.php';
require_once '../views/reservation.php';
require_once '../views/parts/footer.php';
