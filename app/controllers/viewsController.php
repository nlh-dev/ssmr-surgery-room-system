<?php
    namespace app\controllers;
    use app\models\viewsModel;

    class viewsController extends viewsModel{
        
        public function obtainViewsController($obtainViews){
            
            if ($obtainViews != "") {
                $response = $this -> obtainViewsModel($obtainViews);
            } else {
                $response = "login";
            }
            return $response;
        }
    }

?>