<div class="p-4">
    <div class="p-4 mt-14">
        <!-- HOME BREADCRUMB -->
        <?php require_once "./app/views/components/breadcrumbs/patientsBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">

        <div class="w-full flex items-center justify-end my-2">
            <button data-modal-target="addPatientsModal" data-modal-toggle="addPatientsModal" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-center transition duration-100">
                <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
                </svg>
                Añadir Paciente
            </button>
            <?php require_once "./app/views/components/modals/AddPatientsModal.php";?>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-white">
                <thead class="text-xs text-white text-center uppercase bg-gray-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre del Paciente</th>
                        <th scope="col" class="px-6 py-3">Edad</th>
                        <th scope="col" class="px-6 py-3">Fecha y Hora de Cirugía</th>
                        <th scope="col" class="px-6 py-3">Sala</th>
                        <th scope="col" class="px-6 py-3">Médico</th>
                        <th scope="col" class="px-6 py-3">Diagnostico</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3 sr-only">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b text-gray-900 border-gray-200 text-center">
                        <th class="px-6 py-4 font-medium whitespace-nowrap">
                            Hector Navarro
                        </th>
                        <td class="px-6 py-4">
                            25 Años
                        </td>
                        <td class="px-6 py-4">
                            10/02/2025 - 12:00PM
                        </td>
                        <td class="px-6 py-4">
                            #1
                        </td>
                        <td class="px-6 py-4">
                            Juan Carlos Bozo
                        </td>
                        <td class="px-6 py-4">
                            Hernia Umbilical
                        </td>
                        <td class="px-6 py-4">
                        <span class="bg-yellow-500 text-gray-900 text-xs font-bold me-2 px-2.5 py-0.5 rounded-sm">En Espera</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <button class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                    </svg>

                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>