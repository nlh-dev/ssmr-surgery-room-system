<div class="p-4">
    <div class="p-4 mt-14">
        
        <?php require_once "./app/views/components/breadcrumbs/previousPatientsBreadcrumb.php";?>
        <hr class="my-4 text-gray-300">

        <?php
            use app\controllers\patientsController;
            $instancePatients = new patientsController();

            echo $instancePatients -> dischargePatiensListController($url[1], 10, $url[0], "");
        
        ?>
    </div>
</div>