<?php
    require_once "../../config/app.php";
    require_once "../views/includes/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\patientsController;

    if (isset($_POST['patientsModule'])) {
        
        $instancePatients = new patientsController();

        if ($_POST['patientsModule'] == "addPatients") {
            echo $instancePatients -> addPatientsController();
        }
        
        if ($_POST['patientsModule'] == "deletePatients") {
            echo $instancePatients -> deletePatientsController();
        }
        
        if ($_POST['patientsModule'] == "updatePatients") {
            echo $instancePatients -> updatePatientsController();
        }
        
        if ($_POST['patientsModule'] == "updateDischargedPatients") {
            echo $instancePatients -> updateDischargedPatientsController();
        }
        
        if ($_POST['patientsModule'] == "dischargePatients") {
            echo $instancePatients -> dischargePatiensController();
        }
        
    } else {
        session_destroy();
        header("Location: " . APPURL . "login/");
    }