        <?php if ($_SESSION['role'] != 3) { ?>
            <!-- Breadcrumb -->
            <nav class="flex justify-between" aria-label="Breadcrumb">
                <ol class="inline-flex items-center mb-3 sm:mb-0">
                    <li>
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
                            </svg>
                            <p class="px-3 text-lg font-medium text-gray-900">
                                Pacientes
                            </p>
                        </div>
                    </li>
                    <span class="mx-2 text-gray-400">/</span>
                    <li>
                        <div class="flex items-center">
                            <p class="px-3 text-lg font-medium text-gray-500">
                                Lista de Pacientes
                            </p>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php } else { ?>
            <!-- Breadcrumb -->
            <nav class="flex items-center justify-between" aria-label="Breadcrumb">
                <ol class="inline-flex items-center mb-3 sm:mb-0">
                    <li>
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
                            </svg>
                            <p class="px-3 text-lg font-medium text-gray-900">
                                Lista de Pacientes
                            </p>
                        </div>
                    </li>
                </ol>
                <ol>
                    <li class="flex items-center space-x-2">
                        <p class="font-semibold">Leyenda:</p>
                        <div class="flex items-center">
                                <div class="h-4 w-4 rounded-full bg-yellow-500 me-1"></div>
                                <p class="text-yellow-500 font-semibold">En Espera</p>
                        </div>
                        <div class="flex items-center">
                                <div class="h-4 w-4 rounded-full bg-green-500 me-1"></div>
                                <p class="text-green-500 font-semibold">En Cirugía</p>
                        </div>
                        <div class="flex items-center">
                                <div class="h-4 w-4 rounded-full bg-red-600 me-1"></div>
                                <p class="text-red-600 font-semibold">En Recuperación</p>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php } ?>