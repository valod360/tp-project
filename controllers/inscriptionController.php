<?php
require_once '../models/database.php';
require_once '../models/userModel.php';
require_once '../config.php';


if(count($_POST) > 0){
    try{
        $user = new users;
        
        //registration of the firstname from the user
        if(!empty($_POST['firstName'])){
            if(preg_match($regex['firstName'], $_POST['firstName'])){
                $user->firstName = $_POST['firstName'];
                
            }else{
                $formErrors = FIRSTNAME_ERROR_INVALID;
                
            }
        }else{
            $formErrors = FIRSTNAME_ERROR_EMPTY;
        }

        if(!empty($_POST['lastName'])){
            if(preg_match($regex['firstName'], $_POST['firstName'])){
                $user->lastName = $_POST['lastName'];
            }
        }else{
            $formErrors = LASTNAME_ERROR_EMPTY;
        }
    }catch(PDOException $e){
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}


require_once '../views/parts/header.php';
require_once '../views/inscription.php';
require_once '../views/parts/footer.php';