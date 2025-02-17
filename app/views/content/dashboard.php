<div class="p-4">
    <div class="p-4 mt-14">
        <!-- HOME BREADCRUMB -->
        <?php require_once "./app/views/components/breadcrumbs/dashboardBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">

        <div class="grid sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 my-4">
            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="<?= APPURL ?>patients/">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
                        </svg>
                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Pacientes
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver Lista de Pacientes</p>
                </a>
            </div>

            <?php if ($_SESSION['role'] != 3) {?>
            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900  transition duration-100">
                <a href="<?= APPURL ?>previousPatients/">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                        </svg>
                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Pacientes Previos
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver lista de Pacientes Previos</p>
                </a>
            </div>

            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="<?= APPURL ?>doctors/">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd" />
                        </svg>
                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Médicos
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver lista de Médicos</p>
                </a>
            </div>

            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="<?= APPURL ?>diagnosis/">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 21V2.352A3.451 3.451 0 0 0 9.5 2a3.5 3.5 0 0 0-3.261 2.238A3.5 3.5 0 0 0 4.04 8.015a3.518 3.518 0 0 0-.766 1.128c-.042.1-.064.209-.1.313a3.34 3.34 0 0 0-.106.344 3.463 3.463 0 0 0 .02 1.468A4.017 4.017 0 0 0 2.3 12.5l-.015.036a3.861 3.861 0 0 0-.216.779A3.968 3.968 0 0 0 2 14c.003.24.027.48.072.716a4 4 0 0 0 .235.832c.006.014.015.027.021.041a3.85 3.85 0 0 0 .417.727c.105.146.219.285.342.415.072.076.148.146.225.216.1.091.205.179.315.26.11.081.2.14.308.2.02.013.039.028.059.04v.053a3.506 3.506 0 0 0 3.03 3.469 3.426 3.426 0 0 0 4.154.577A.972.972 0 0 1 11 21Zm10.934-7.68a3.956 3.956 0 0 0-.215-.779l-.017-.038a4.016 4.016 0 0 0-.79-1.235 3.417 3.417 0 0 0 .017-1.468 3.387 3.387 0 0 0-.1-.333c-.034-.108-.057-.22-.1-.324a3.517 3.517 0 0 0-.766-1.128 3.5 3.5 0 0 0-2.202-3.777A3.5 3.5 0 0 0 14.5 2a3.451 3.451 0 0 0-1.5.352V21a.972.972 0 0 1-.184.546 3.426 3.426 0 0 0 4.154-.577A3.506 3.506 0 0 0 20 17.5v-.049c.02-.012.039-.027.059-.04.106-.064.208-.13.308-.2s.214-.169.315-.26c.077-.07.153-.14.225-.216a4.007 4.007 0 0 0 .459-.588c.115-.176.215-.361.3-.554.006-.014.015-.027.021-.041.087-.213.156-.434.205-.659.013-.057.024-.115.035-.173.046-.237.07-.478.073-.72a3.948 3.948 0 0 0-.066-.68Z" />
                        </svg>
                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Diagnosticos
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver lista de Diagnosticos</p>
                </a>
            </div>
            <?php }?>
        </div>

        <?php if ($_SESSION['role'] == 1) {?>
        <?php require_once "./app/views/components/breadcrumbs/dashboardAdminBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">
        <div class="grid sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 my-4">
            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="<?= APPURL?>users/">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd" />
                        </svg>

                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Usuarios
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver Lista de Usuarios</p>
                </a>
            </div>
        </div>
        <?php }?>
    </div>
</div>