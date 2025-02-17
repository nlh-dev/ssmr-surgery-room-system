<div class="p-4">
    <div class="p-4 mt-14">
        <?php require_once "./app/views/components/breadcrumbs/DiagnosisBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">

        <div class="w-full flex items-center justify-end my-2">
            <button data-modal-target="addDiagnosisModal" data-modal-toggle="addDiagnosisModal" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-center transition duration-100">
                <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
                </svg>
                Añadir Diagnostico
            </button>
            <?php require_once "./app/views/components/modals/AddDiagnosisModal.php"; ?>
        </div>

        <?php
            use app\controllers\diagnosisController;
            $instaceDiagnosis = new diagnosisController();

            echo $instaceDiagnosis -> diagnosisListController($url[1], 10, $url[0], "");
        
        ?>
    </div>
</div>