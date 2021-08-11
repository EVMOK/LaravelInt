<div id="deletemodal" class="modal-bg hidden fixed top-0 left-0 right-0 bottom-0 w-full h-full overflow-auto z-50">
    <div class="bg-red-600 relative p-8 max-w-xs mx-auto my-10 sm:my-32 shadow-lg rounded">
        <div class="mt-2">
            <form action="" method="POST" class="remove-record text-center">
                @csrf
                @method('DELETE')
                <div class="md:flex md:items-center mb-6">
                    <h3 class="text-xl text-white font-bold">Are you sure you want to delete {{ $name ?? '' }}?</h3>
                </div>
                <div class="md:flex md:items-center">
                    <button class="mx-auto uppercase text-sm shadow bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded" type="submit">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
