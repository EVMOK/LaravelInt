<div class="sidebar hidden sm:block w-0 sm:w-1/6 bg-gray-200 h-screen shadow fixed top-0 left-0 bottom-0 z-40 overflow-y-auto">
    <div class="mb-6 mt-20 px-6">
        @role('Admin')
        <a href="{{ route('groups.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <span class="ml-2 text-sm font-semibold">Группы</span>
        </a>
        <a href="{{ route('students.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <span class="ml-2 text-sm font-semibold">Студенты</span>
        </a>
        <a href="{{ route('assignrole.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <span class="ml-2 text-sm font-semibold">Назначение ролей</span>
        </a>
        <a href="{{ route('roles-permissions') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <span class="ml-2 text-sm font-semibold">Роли и разрешения</span>
        </a>
        @endrole
    </div>
</div>
