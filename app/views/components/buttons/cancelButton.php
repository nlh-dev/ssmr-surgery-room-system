<button data-modal-hide="addPatientsModal" type="button" class="buttonBack px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 mr-3">
    <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    Cancelar
</button>

<script type="text/javascript">
    let buttonBack = document.querySelector(".buttonBack");

    buttonBack.addEventListener('click', function(e) {
        e.preventDefault();
        window.history.back();
    });
</script>