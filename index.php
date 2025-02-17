<?php

require_once "./config/app.php";
require_once "./app/views/includes/session_start.php";
require_once "./autoload.php";

if (isset($_GET['views'])) {
    $url = explode("/", $_GET['views']);
} else {
    $url = ["login"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./app/views/includes/head.php"; ?>
</head>

<body>
    <?php

    use app\controllers\loginController;
    use app\controllers\viewsController;
    use app\controllers\patientsController;
    use app\controllers\doctorsController;
    use app\controllers\diagnosisController;
    use app\controllers\usersController;


    $instanceLogin = new loginController();
    $instanceUsers = new usersController();
    $instanceDiagnosis = new diagnosisController();
    $instacePatients = new patientsController();
    $instanceDoctors = new doctorsController();

    $viewsController = new viewsController();
    $obtainViews = $viewsController->obtainViewsController($url[0]);

    if ($obtainViews == "login" || $obtainViews == "404") {
        require_once "./app/views/content/" . $obtainViews . ".php";
    } else {
        //LOG OUT SESSION
        if ((!isset($_SESSION['ID']) || $_SESSION['ID'] == "") || (!isset($_SESSION['userName']) || $_SESSION['userName'] == "")) {
            $instanceLogin->singOutController();
        }
        require_once $obtainViews;
        require_once "./app/views/layout/navbar.php";
    }

    require_once "./app/views/includes/scripts.php";
    ?>
</body>

</html>