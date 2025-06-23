<?php if ($_SESSION['role'] == 3) { ?>
    <meta http-equiv="refresh" content="50">
<?php } ?>

<div class="p-4">
    <div class="p-4 mt-14">
        <!-- HOME BREADCRUMB -->
        <?php require_once "./app/views/components/breadcrumbs/patientsBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">

        <?php if ($_SESSION['role'] != 3) { ?>
            <div class="w-full flex items-center justify-end my-2">
                <button data-modal-target="addPatientsModal" data-modal-toggle="addPatientsModal" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-center transition duration-100">
                    <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
                    </svg>
                    Añadir Paciente
                </button>
                <?php require_once "./app/views/components/modals/AddPatientsModal.php"; ?>
            </div>
        <?php } ?>


        <?php

        use app\controllers\patientsController;
        $instancePatients = new patientsController();

        switch ($_SESSION['role']) {
            case 1:
                echo $instancePatients ->patientsListController($url[1], 10, $url[0], "");
                break;
            case 2:
                echo $instancePatients ->patientsListController($url[1], 10, $url[0], "");
                break;
            case 3:
                echo $instancePatients->patientsListCardsController($url[1], 10, $url[0], "");
                break;
        }
        ?>

        <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="block max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
                            Nombre del Paciente, 25 Años
                        </h5>
                    </div>
                    <div class="h-4 w-4 rounded-full bg-green-500"></div>
                </div>
                <div class="">
                    <div class="flex items-center">
                        <div class="h-2 w-2 rounded-full bg-gray-500 me-2"></div>
                        <p class="font-normal text-gray-700 font-semibold">
                            N° de Sala: #3
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="h-2 w-2 rounded-full bg-gray-500 me-2"></div>
                        <p class="font-normal text-gray-700 font-semibold">
                            Doctor(a): Berenice Merchan
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="h-2 w-2 rounded-full bg-gray-500 me-2"></div>
                        <p class="font-normal text-gray-700 font-semibold">
                            Fecha de Cirugía: 23/06/2025, 10:00 a. m.
                        </p>
                    </div>

                </div>
                <div class="w-full mt-2 p-2 rounded-lg border border-gray-300">
                    <p class="font-semibold">Diagnostico:</p>
                    <p class="font-semibold text-lg">Inflamación, infección y terapia antimicrobiana en cirugía</p>
                </div>
            </div>

        </div> -->

    </div>
</div>