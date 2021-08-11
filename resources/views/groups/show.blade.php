@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="/groups/create"><button type="button" class="btn btn-lg btn-info">Добавить студента</button></a>
                <hr><br>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Студент</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td><a href="/students/show/{{ $student->id }}">{{ $student->name }}</a></td>
                            <td><a href="/students/edit/{{ $student->id }}"><button type="button" class="btn btn-priamry">Редактировать</button></a></td>
                            <td><a href="/students/delete/{{ $student->id }}"><button type="button" class="btn btn-danger">Удалить</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
