<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="h-96 w-full flex justify-center my-4">
            <img src="<?= APPURL ?>app/views/images/error-404-monochrome.svg" alt="404 Error">
        </div>
        <div class="mx-auto max-w-screen-sm text-center">
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Algo salio mal.</p>
            <p class="mb-4 text-lg font-light text-gray-500">No podemos encontrar la página que necesitas.</p>
            <button class="buttonBack inline-flex items-center justify-center text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Volver a la Página Anterior
            </button>
        </div>
    </div>
</section>

<script type="text/javascript">
    let buttonBack = document.querySelector(".buttonBack");

    buttonBack.addEventListener('click', function(e) {
        e.preventDefault();
        window.history.back();
    });
</script>