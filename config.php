<?php
$regex = [
    'firstName' => '/^[A-Z][A-Za-z\é\è\ê\ë\-]+$/',
    'city' => '/^[a-zA-ZÀ-ÖØ-öø-ÿ-]+(?:[ \'-][a-zA-ZÀ-ÖØ-öø-ÿ]+)*$/',
    'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
    'phone' => '/^0[1-9](\d{8})$/',
    'password' => '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+|~-]).{8,}$/'
];



$formErrors = [];

//erreur general
define('GENERAL_ERROR', 'Une erreur est survenue merci de nous contacter si le problème persiste');

//erreur liée au prenom et au nom
define('FIRSTNAME_ERROR_EMPTY', 'Le champ pour le prénom n\'est pas renseigner');
define('FIRSTNAME_ERROR_INVALID', 'Le prénom renseigner n\'est pas valide');
define('LASTNAME_ERROR_EMPTY', 'Le champ pour nom n\'est pas renseigner');
define('LASTNAME_ERROR_INVALID', 'Le nom renseigner n\'est pas valide');

//erreur pour la ville
define('CITY_ERROR_EMPTY', 'Le champ pour la ville n\'est pas renseigner');
define('CITY_ERROR_INVALID', 'La ville renseigner n\'est pas valide');

//erreur pour l'email
define('EMAIL_ERROR_EMPTY', 'Le champ pour l\'email n\'est pas renseigner');
define('EMAIL_ERROR_INVALID', 'L\'email renseigner n\'est pas valide');
define('EMAIL_ERROR_ALREADY_EXISTS', 'L\'email renseigner existe déja');

//pour l'age
define('AGE_ERROR_EMPTY', 'Le champ pour l\'age n\'est pas renseigner');
define('AGE_ERROR_INVALID', 'Il faut-être majeur pour pouvoir s\'inscrire');

//pour le numero
define('PHONE_ERROR_EMPTY', 'Le champ pour le numéro de téléphone n\'est pas renseigner');
define('PHONE_ERROR_INVALID', 'Le numéro de téléphone renseigner n\'est pas valide');

//pour le mot de passe
define('PASS_ERROR_EMPTY', 'Le champ pour le mot de passe n\'est pas renseigner');
define('PASS_ERROR_INVALID', 'Le mot de passe doient contenir une lettre en majuscule 8 carachtere et un carachtere special');
define('PASS_ERROR_DIFFERENT_PASS', 'Les mot de passes sont différent');
define('PASS_COMFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est obligatoire');

//compte crée
define('USER_REGISTER_SUCCES', 'Votre compte a bien été crée vous pouvez des a présent vous connecter');


//pour la connexion
//email
define('USER_EMAIL_EMPTY', 'Le champ pour l\'email n\'est pas renseigner');
define('USER_LOGIN_ERROR', 'l\'email ou le mot de passe est incorrect');
define('USER_PASSWORD_ERROR_EMPTY', 'Le champ pour le mot de passe n\'est pas renseigner');











//pour la plane reservation

define('PLANE_SECTION_ERROR_EMPTY', 'Le choix d\'un appareil est obligatoire');
define('PLANE_SECTION_ERROR_NOT_AVAILABLE', 'l\'avion choisi n\'est plus disponible ou à déja été réserver');

define('PLANE_ERROR_TAKEN', 'Les horraire pour cette avion sont déja pris');

//pour les date
define('LOAN_ERROR_EMPTY', 'Veuillez indiquer une date de reservation');
define('LOAN_ERROR_DATE_EXPIRED', 'La date indiquez n\'est plus à jour');

define('LOAN_RETURN_ERROR_EMPTY', 'Veuillez indiquer une date de retour');
define('LOAN_ERROR_BEFORE_FIRST_DATE', 'Merci d\'indiquez une date superieur a la date de location');

// pour les radio
define('RADIO_ERROR_EMPTY', 'veuillez selectioner soient l\'achat soient la réservation');

//pour la reussite de la reservation
define('RESERVATION_SCCUESS', 'La réservation à été effectuer');


//pour la modification d'une reservation

define('MODIFICATION_SUCCESS', 'La modification à été faire avec succes');




// pour les erreur de la modification de l'user
define('MODIFICATION_ERROR_FIRSTNAME_NOT_SET', 'Merci de ne pas laisser vide le champ du Prénom');
define('MODIFICATION_ERROR_LASTNAME_NOT_SET', 'Merci de ne pas laisser vide le champ du Nom');
define('MODIFICATION_ERROR_AGE_NOT_SET', 'Merci de ne pas laisser vide le champ de l\'âge');
define('MODIFICATION_ERROR_CITY_NOT_SET', 'Merci de ne pas laisser vide le champ de la ville');
define('MODIFICATION_ERROR_EMAIL_NOT_SET', 'Merci de ne pas laisser vide le champ de l\'email');
define('MODIFICATION_ERROR_PHONE_NUMBER_NOT_SET', 'Merci de ne pas laisser vide le champ du numéro de téléphone');





