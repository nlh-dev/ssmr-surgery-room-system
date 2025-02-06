<?php
    namespace app\models;

    class viewsModel {

        protected function obtainViewsModel($obtainViews){
            $viewsList = [
                "dashboard",
                "users",
                "add-users",
                "edit-users",
                "patients",
                "previous-patients",
                "add-patients",
                "edit-patients",
                "doctors",
                "add-doctors",
                "diagnosis",
                "add-diagnosis",
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