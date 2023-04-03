<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /accueil');
    exit();
}

require_once '../models/database.php';
require_once '../models/planesModel.php';
require_once '../models/userModel.php';
require_once '../models/reservationModel.php';
require_once '../config.php';


$plane = new planes();
$res = new reservation();
$planeList = $plane->checkPlanes();

if (count($_POST) > 0) {
    try {
        /**
         * pour la selection de l'avion je check si il a déja été pris ou non
         *  */

        if (!empty($_POST['resource_id'])) {
            $resourceData = explode(' - ', $_POST['resource_id']);
            $plane->name = $resourceData[1];
            if ($plane->checkIfAvailable()) {
                if ($plane->checkIfAvailable() == 'disponible') {
                    $plane->name = $resourceData[1];
                    $plane->status = 'indisponible';
                    $res->id_planes = intval($resourceData[0]);
                } else {
                    $formErrors['planeSelection'] = PLANE_SECTION_ERROR_NOT_AVAILABLE;
                }
            }
        } else {
            $formErrors['planeSelection'] = PLANE_SECTION_ERROR_EMPTY;
        }

        /**
         * pour la verification du debut de la reservation
         */

        if (!empty($_POST['startLoan'])) {
            if ($_POST['startLoan'] >= date('Y-m-d')) {
                $res->loan = $_POST['startLoan'];
                $res->startLoan = $_POST['startLoan'];
            }
        } else {
            $formErrors['loan'] = LOAN_ERROR_EMPTY;
        }

        /**
         * pour la verification de la fin de la reservation
         * 
         */

        if (!empty($_POST['endLoan'])) {
            $res->loanReturn = $_POST['endLoan'];
            $res->endLoan = $_POST['endLoan'];
        } else {
            $formErrors['loanReturn'] = LOAN_RETURN_ERROR_EMPTY;
        }




        /**
         * pour check si  c'est une reservation ou un achat
         */
        if (isset($_POST['planeRes'])) {
            if ($_POST['planeRes'] === 'reservation') {
                $res->activityType = 'Réservation';
                $plane->activityType = 'Réservation';
            } elseif ($_POST['planeRes'] === 'achat') {
                $res->activityType = 'Achat';
                $res->activityType = 'Achat';
            } else {
                $formErrors['radio'] = RADIO_ERROR_EMPTY;
            }
        } else {
            $formErrors['radio'] = RADIO_ERROR_EMPTY;
        }


        /* pour le push et la mis à jours */
        if (count($formErrors) ==  0) {
            $res->id_user = $_SESSION['user']['id'];
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
            }else{
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
require_once '../views/planeReservation.php';
require_once '../views/parts/footer.php';
