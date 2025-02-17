<?php
    require_once "../../config/app.php";
    require_once "../views/includes/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\diagnosisController;

    if (isset($_POST['diagnosisModule'])) {
        
        $instancePatients = new diagnosisController();

        if ($_POST['diagnosisModule'] == "addDiagnosis") {
            echo $instancePatients -> addDiagnosisController();
        }
        
        if ($_POST['diagnosisModule'] == "deleteDiagnosis") {
            echo $instancePatients -> deleteDiagnosisController();
        }
        
        if ($_POST['diagnosisModule'] == "updateDiagnosis") {
            echo $instancePatients -> updateDiagnosisController();
        }
    
        
    } else {
        session_destroy();
        header("Location: " . APPURL . "login/");
    }