<?php
$uri = $_SERVER['REQUEST_URI'];

if($uri == "/DigitSchool_TFE_2023/index.php?/templates/factures/facture"){
    if(!empty($_POST['role'])){
        $_SESSION['roleSearchBar'] = $_POST['role'];
        $_SESSION['roleIdSearch']  = $_POST['role'].'Id';
        if(!empty($_POST['inputSearch'])){
            $matricule = $_POST['inputSearch'];
            if (ctype_digit($matricule)) {
                $id = $matricule;
                $_SESSION['resultFacture'] = getFacture($conn,$id);
                var_dump($_SESSION['resultFacture']);
            } else {
                echo "L'input ne ne contient pas uniquement des chiffres";
            }
        }
    }
    require_once 'templates/factures/facture.php';
}