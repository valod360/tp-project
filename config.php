<?php
$regex = [
    'firstName' => '/^[A-Z][A-Za-z\é\è\ê\ë\-]+$/',
];



$formErrors = [];

//erreur general
define('GENERAL_ERROR', 'Une erreur est survenue merci de nous contacter si le problème persiste');

//erreur liée au prenom et au nom
define('FIRSTNAME_ERROR_EMPTY', 'Le champ pour le prénom n\'est pas renseigner');
define('FIRSTNAME_ERROR_INVALID', 'Le prénom renseigner n\'est pas valide');
define('LASTNAME_ERROR_EMPTY', 'Le champ pour nom n\'est pas renseigner');
define('LASTNAME_ERROR_INVALID', 'Le nom renseigner n\'est pas valide');
