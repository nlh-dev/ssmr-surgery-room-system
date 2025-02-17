<?php
    namespace app\models;

    class viewsModel {

        protected function obtainViewsModel($obtainViews){
            $viewsList = [
                "logout",
                "dashboard",
                "users",
                "addUsers",
                "editUsers",
                "patients",
                "editPatients",
                "editDischargedPatients",
                "previousPatients",
                "doctors",
                "addDoctors",
                "editDoctors",
                "diagnosis",
                "addDiagnosis",
                "editDiagnosis",
            ];

            if (in_array($obtainViews, $viewsList)) {
                if (is_file("./app/views/content/".$obtainViews.".php")) {
                    $contentRender = "./app/views/content/".$obtainViews.".php";
                } else {
                    $contentRender = "404";
                }
            } elseif ($obtainViews == "login" || $obtainViews == "index") {
                $contentRender = "login";
            } else {
                $contentRender = "404";
            }

            return $contentRender;
        }
    }


?>