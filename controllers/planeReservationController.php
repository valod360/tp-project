<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /accueil');
    exit();
}

require_once '../models/database.php';
require_once '../models/planesModel.php';
require_once '../models/userModel.php';
require_once '../config.php';



/**
 * etape 1 faire le formulaire de reservation
 * etape 2 regarder si la reservation est disponible ou non
 * etape 3 si une reservation est faite rendre l'appareil indisponible pour la durée qui a été prescrite
 */

if(count($_POST) > 0){
    $plane = new planes;
    if(isset($_POST['resource_id'])){
       var_dump($plane->checkIfAvailable());
    }
}


require_once '../views/parts/header.php';
require_once '../views/planeReservation.php';
require_once '../views/parts/footer.php';