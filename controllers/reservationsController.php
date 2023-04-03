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
$update = false;


// pour annuller la reservation
if (!empty($_POST['annulerRes'])) {
    $res->id_planes = $_POST['id'];
    $res->dropReservation();
    header('Location: /réservation-perso');
    exit();
}





//pour passer a la page de modification de la reservation
if (!empty($_POST['modifierRes'])) {
    $update = true;
    $res->id_planes = $_POST['id'];
    if (!empty($_POST['dateModificationLoan'])) {
        if ($_POST['dateModificationLoan'] >= date('Y-m-d')) {
            $res->loan = $_POST['dateModificationLoan'];
            $res->startLoan = $_POST['dateModificationLoan'];
        }
    } else {
        $formErrors['dateModificationLoan'] = LOAN_ERROR_EMPTY;
    }
    if (!empty($_POST['dateModificationLoanReturn'])) {
        $res->loanReturn = $_POST['dateModificationLoanReturn'];
        $res->endLoan = $_POST['dateModificationLoanReturn'];
    } else {
        $formErrors['dateModificationLoanReturn'] = LOAN_RETURN_ERROR_EMPTY;
    }



    if (count($formErrors) ==  0) {
        $available = $res->checkLoan();
        if ($res->loanReturn >= $res->loan) {
            if (count($available) > 0) {
                $formErrors['planeSelection'] = PLANE_ERROR_TAKEN;
            } else {
                $res->updateReservation();
                $form = [
                    'status' => 'success',
                    'message' => MODIFICATION_SUCCESS
                ];
            }
        } else {
            $formErrors['loanReturn'] = LOAN_ERROR_BEFORE_FIRST_DATE;
        }
    }else{
        var_dump($formErrors);
    } 
}


//pour la modification de la reservation


require_once '../views/parts/header.php';
require_once '../views/reservation.php';
require_once '../views/parts/footer.php';
