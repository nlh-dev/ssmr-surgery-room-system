<?php
    require_once "../../config/app.php";
    require_once "../views/includes/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\doctorsController;

    if (isset($_POST['doctorsModule'])) {
        
        $instancePatients = new doctorsController();

        if ($_POST['doctorsModule'] == "addDoctor") {
            echo $instancePatients -> addDoctorsController();
        }
        
        if ($_POST['doctorsModule'] == "deleteDoctor") {
            echo $instancePatients -> deleteDoctorsController();
        }
        
        if ($_POST['doctorsModule'] == "updateDoctor") {
            echo $instancePatients -> updateDoctorsController();
        }
    
        
    } else {
        session_destroy();
        header("Location: " . APPURL . "login/");
    }