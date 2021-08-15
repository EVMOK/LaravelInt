@extends('layouts.app')

@section('content')
    @if ($students->count())
        <table class="table table-bordered">
            <tr>
                <th width="10%">ФИО</th>
                <th width="20%">Группа</th>
                <th width="20%">Дата рождения</th>
                <th><i class="fas fa-eye"></i></th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->group->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->date_born)->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('students.show', ['student' => $student->id]) }}"
                           title="Предварительный просмотр">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        @role('admin')
                        <a href="{{ route('students.edit', ['student' => $student->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                        @endrole
                    </td>
                    <td>
                        @role('admin')
                        <form action="{{ route('students.destroy', ['student' => $student->id]) }}"
                              method="post" onsubmit="return confirm('Удалить эту запись?')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="return" value="back">
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $students->links() }}
    @else
        <p>Нет студентов</p>
    @endif
@endsection
