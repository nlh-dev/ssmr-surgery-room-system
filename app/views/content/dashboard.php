<div class="p-4">
    <div class="p-4 mt-14">
        <!-- HOME BREADCRUMB -->
        <?php require_once "./app/views/components/dashboardBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">

        <div class="grid sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 my-4">
            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="<?= APPURL?>patients/">
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

            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900  transition duration-100">
                <a href="#">
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
                <a href="#">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </svg>
                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Doctores
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver lista de Observaciones</p>
                </a>
            </div>

            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="#">
                    <div class="flex justify-start items-center">
                        <svg class="w-8 h-8 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </svg>
                        <h1 class="mb-2 text-3xl font-bold tracking-tight text-white">
                            Diagnosticos
                        </h1>
                    </div>
                    <p class="font-bold text-gray-200">Ver lista de Diagnosticos</p>
                </a>
            </div>

        </div>

        <?php require_once "./app/views/components/dashboardAdminBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">
        <div class="grid sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 my-4">
            <div class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 transition duration-100">
                <a href="#">
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
    </div>
</div>