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
$res->id = $_GET['id'];
$res->id_user = $_SESSION['user']['id'];

if (count($_POST) > 0) {
    try {
        /**
         * pour la verification du debut de la reservation
         */

        if (!empty($_POST['dateModificationLoan'])) {
            if ($_POST['dateModificationLoan'] >= date('Y-m-d')) {
                $res->loan = $_POST['dateModificationLoan'];
                $res->startLoan = $_POST['dateModificationLoan'];
            }
        } else {
            $formErrors['dateModificationLoan'] = LOAN_ERROR_EMPTY;
        }

        /**
         * pour la verification de la fin de la reservation
         * 
         */

        if (!empty($_POST['dateModificationLoanReturn'])) {
            $res->loanReturn = $_POST['dateModificationLoanReturn'];
            $res->endLoan = $_POST['dateModificationLoanReturn'];
        } else {
            $formErrors['dateModificationLoanReturn'] = LOAN_RETURN_ERROR_EMPTY;
        }




        /* pour le push et la mis à jours */
        if (count($formErrors) ==  0) {
            $available = $res->checkModifieLoan();
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
        }
    } catch (PDOException $e) {
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}








require_once '../views/parts/header.php';
require_once '../views/reservationModification.php';
require_once '../views/parts/footer.php';
