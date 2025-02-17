<?php
    require_once "../../config/app.php";
    require_once "../views/includes/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\usersController;

    if (isset($_POST['usersModule'])) {
        
        $instanceUsers = new usersController();

        if ($_POST['usersModule'] == "addUser") {
            echo $instanceUsers -> addUsersController();
        }
        
        if ($_POST['usersModule'] == "deleteUser") {
            echo $instanceUsers -> deleteUsersController();
        }
        
        if ($_POST['usersModule'] == "updateUser") {
            echo $instanceUsers -> updateUsersController();
        }
    
        
    } else {
        session_destroy();
        header("Location: " . APPURL . "login/");
    }