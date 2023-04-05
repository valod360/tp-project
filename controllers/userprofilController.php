<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: accueil');
    exit();
}

require_once '../models/database.php';
require_once '../models/userModel.php';
require_once '../config.php';

$user = new users;
$user->id = $_SESSION['user']['id'];
$userList = $user->checkUserInformation();




if (isset($_POST['confirmModification'])) {
    try {
        if (!empty($_POST['firstNameModif'])) {
            $user->firstName = $_POST['firstNameModif'];
        } else {
            $formErrors['firstNameModif'] = MODIFICATION_ERROR_FIRSTNAME_NOT_SET;
        }

        if (!empty($_POST['lastNameModif'])) {
            $user->lastName = $_POST['lastNameModif'];
        } else {
            $formErrors['lastNameModif'] = MODIFICATION_ERROR_LASTNAME_NOT_SET;
        }

        if (!empty($_POST['ageModif'])) {
            $user->major = intval($_POST['ageModif']);
        } else {
            $formErrors['ageModif'] = MODIFICATION_ERROR_AGE_NOT_SET;
        }

        if (!empty($_POST['cityModif'])) {
            $user->city = $_POST['cityModif'];
        } else {
            $formErrors['cityModif'] = MODIFICATION_ERROR_CITY_NOT_SET;
        }

        if (!empty($_POST['emailModif'])) {
            $user->email = $_POST['emailModif'];
        } else {
            $formErrors['emailModif'] = MODIFICATION_ERROR_EMAIL_NOT_SET;
        }

        if (!empty($_POST['phoneNumberModif'])) {
            $user->phoneNumber = $_POST['phoneNumberModif'];
        } else {
            $formErrors['phoneNumberModif'] = MODIFICATION_ERROR_PHONE_NUMBER_NOT_SET;
        }

        
        
        if (count($formErrors) == 0) {
            $user->updateUserInformation();
            $form = [
                'status' => 'success',
                'message' => MODIFICATION_SUCCESS
            ];
        } 
    } catch (PDOException $e) {
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}


if (isset($_POST['confirmSupression'])) {
    try {
        $user->deleteUser();
        header('Location: /accueil');
    } catch (PDOException $e) {
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}



require_once '../views/parts/header.php';
require_once '../views/userProfil.php';
require_once '../views/parts/footer.php';
