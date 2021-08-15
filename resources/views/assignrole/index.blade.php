@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    <h2 class="text-gray-700 uppercase font-bold">Assign Role</h2>
                </div>
                <hr>
                <br>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Назначить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="w-2/12 px-4 py-3 flex flex-wrap">
                                    @foreach ($user->roles as $role)
                                        <span
                                            class="bg-gray-200 text-xs font-semibold text-gray-600 tracking-tight px-3 py-1 border rounded-full">{{ $role->name }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="w-2/12 flex justify-end px-3">
                                    <a href="{{ route('assignrole.edit',$user->id) }}">Назначить</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-8">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
