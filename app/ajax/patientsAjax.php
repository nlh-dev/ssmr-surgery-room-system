<?php
    require_once "../../config/app.php";
    require_once "../views/includes/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\patientsController;

    if (isset($_POST['patientsModule'])) {
        
        $instancePatients = new patientsController();

        if ($_POST['patientsModule'] == "addPatient") {
            echo $instancePatients -> addPatientsController();
        }
        
    } else {
        session_destroy();
        header("Location: " . APPURL . "login/");
    }