<div class="w-full h-screen flex justify-center items-center bg-gray-900">
    <div class="w-96 bg-white border border-gray-200 rounded-lg shadow p-8">
        <form class="space-y-5" method="POST" autocomplete="off">
            <div class="flex items-center">
                <img src="<?= APPURL ?>app/views/images/ssmr-1.png" class="h-10 text-white" alt="">
                <div>
                    <h5 class="text-2xl font-medium text-gray-500 px-2">INICIO DE SESIÓN</h5>
                    <h5 class="text-sm font-medium text-gray-500 px-2">Área de Quirofano</h5>
                </div>
            </div>
            <div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900">Nombre de Usuario</label>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </div>
                    <input type="text" id="loginUser" name="loginUser" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Inserte Nombre de Usuario....">
                </div>
            </div>

            <div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="loginPassword" name="loginPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Inserte Contraseña....">
                </div>
            </div>

            <?php require_once './app/views/components/toggleSwitches/ToggleSwitchPassword.php'; ?>

            <button type="submit" class="w-full text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-100">Ingresar</button>
            <div class="flex justify-center items-center border-t border-gray-300">
                <div class="mt-3">
                    <div>
                        <p class="font-medium text-gray-500 text-md text-center">
                            &copy <?= date("Y")?> Sistema de Salud Madre Rafols
                        </p>
                        <p class="font-normal text-gray-500 text-sm text-center">
                            Departamento de Informática
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
if (isset($_POST['loginUser']) && isset($_POST['loginPassword'])) {
    $instanceLogin->singInController();
}
?>