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
    <?php require_once "./app/views/includes/head.php";?>
</head>
<body>
    <?php
        use app\controllers\viewsController;
        $viewsController = new viewsController();
        $obtainViews = $viewsController->obtainViewsController($url[0]);

        if ($obtainViews == "login" || $obtainViews == "404") {
            require_once "./app/views/content/".$obtainViews.".php";
            
        } else {
            require_once $obtainViews;
            require_once "./app/views/layout/navbar.php";
        }

        require_once "./app/views/includes/scripts.php";
        ?>
</body>
</html>