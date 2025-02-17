<div class="">
    <div class="w-full my-12 flex justify-center items-center">

        <div class="w-96 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form class="space-y-5" action="" method="POST" autocomplete="off">
                <div class="flex items-center">
                    <img src="<?= APPURL ?>app/views/images/ssmr-1.png" class="h-10 text-white" alt="">
                    <h5 class="text-2xl font-medium text-gray-500 px-2">INICIO DE SESIÓN</h5>
                </div>
                <div class="relative">
                    <input type="text" id="loginUser" name="loginUser" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none peer" placeholder="" />
                    <label for="floating_outlined" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre de Usuario</label>
                </div>
                <div class="relative">
                    <input type="password" id="loginPassword" name="loginPassword" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none peer" placeholder="" />
                    <label for="floating_outlined" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Contraseña</label>
                </div>

                <?php require_once './app/views/components/toggleSwitches/ToggleSwitchPassword.php'; ?>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ingresar</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['loginUser']) && isset($_POST['loginPassword'])) {
    $instanceLogin->singInController();
}
?>