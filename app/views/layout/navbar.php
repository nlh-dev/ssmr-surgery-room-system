<nav class="fixed left-0 top-0 z-0 w-full bg-gray-900 border-gray-200">
  <div class="w-full flex flex-wrap items-center justify-between p-4">
    <a href="<?= APPURL ?>dashboard/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="<?= APPURL ?>app/views/images/ssmr-2.png" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Quirofano</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 transition duration-100" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd" />
        </svg>        
      </button>
      <!-- Dropdown menu -->
      <div class="justify-end z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 uppercase">
            <?= $_SESSION['firstName']?>
            <?= $_SESSION['lastName']?>
          </span>
          <span class="block text-sm text-gray-500 font-medium truncate">Rol: <?= $_SESSION['roleName']?></span>
        </div>
        <ul class="py-2 border-t border-gray-300" aria-labelledby="user-menu-button">
          <li>
            <a href="<?= APPURL?>logout/" id="logoutButton" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-500 hover:text-white transition duration-100">
              Cerrar Sesión
            </a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100  rounded-lg bg-gray-900 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
        <?php if ($_SESSION['role'] != 3) {?>
        <li>
          <a href="<?= APPURL?>dashboard/" class="block py-2 px-3 text-white rounded-sm md:hover:bg-transparent md:hover:text-blue-700 md:p-0 bg-gray-900 transition duration-100">Inicio</a>
        </li>
        <li>
          <a href="<?= APPURL?>patients/" class="block py-2 px-3 text-white rounded-sm md:hover:bg-transparent md:hover:text-blue-700 md:p-0 bg-gray-900 transition duration-100">Pacientes</a>
        </li>
        <li>
          <a href="<?= APPURL?>previousPatients/" class="block py-2 px-3 text-white rounded-sm md:hover:bg-transparent md:hover:text-blue-700 md:p-0 bg-gray-900 transition duration-100">Pacientes Previos</a>
        </li>
        <li>
          <a href="<?= APPURL?>doctors/" class="block py-2 px-3 text-white rounded-sm md:hover:bg-transparent md:hover:text-blue-700 md:p-0 bg-gray-900 transition duration-100">Médicos</a>
        </li>
        <li>
          <a href="<?= APPURL?>diagnosis/" class="block py-2 px-3 text-white rounded-sm md:hover:bg-transparent md:hover:text-blue-700 md:p-0 bg-gray-900 transition duration-100">Diagnosticos</a>
        </li>
        <?php }?>

        <?php if ($_SESSION['role'] == 1) {?>
          <li>
            <a href="<?= APPURL?>users/" class="block py-2 px-3 text-white rounded-sm md:hover:bg-transparent md:hover:text-blue-700 md:p-0 bg-gray-900 transition duration-100">Usuarios</a>
          </li>
        <?php }?>

      </ul>
    </div>
  </div>
</nav>