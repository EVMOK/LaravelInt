@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('students.delete', $student->id) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $student->id }}</td>
        </tr>
        <tr>
            <th>User Name</th><td>{{ $student->user->name }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{ $student->user->email }}</td>
        </tr>
        <tr>
            <th>Группа</th><td>{{ $student->group->name }}</td>
        </tr>
        <tr>
            <th>Дата рождения</th><td>{{ $student->date_born }}</td>
        </tr>
        @foreach ($student->scores as $score)
            <tr>
                <th>Предмет/Оценка</th><td>{{ $score->discipline->name }}/{{ $score->value }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
