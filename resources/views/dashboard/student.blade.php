<div class="mt-8 bg-white rounded">
    <div class="w-full max-w-2xl px-6 py-12">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Имя :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="block text-gray-600 font-bold">{{ $student->user->name }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Email :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $student->user->email }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Группа :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $student->group->name }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Дата рождения :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $student->date_born }}</span>
            </div>
        </div>
    </div>
</div>
