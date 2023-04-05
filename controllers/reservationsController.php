<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /accueil');
    exit();
}


require_once '../models/database.php';
require_once '../models/userModel.php';
require_once '../models/reservationModel.php';
require_once '../config.php';


$res = new reservation;
$res->id_user = $_SESSION['user']['id'];

$result = $res->seeLoan();

// pour annuller la reservation
if (!empty($_POST['annulerRes'])) {
    $res->id_planes = $_POST['id'];
    $res->dropReservation();
    header('Location: /réservation-perso');
    exit();
}


//pour passer a la page de modification de la reservation
if (!empty($_POST['modifierRes'])) {
    $res->id_planes = $_POST['id'];
}

if(!empty($_POST['modifierRes'])){
    header('Location: /modifier-resvervation');
    exit();
}

require_once '../views/parts/header.php';
require_once '../views/reservation.php';
require_once '../views/parts/footer.php';
