@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="/groups/create"><button type="button" class="btn btn-lg btn-info">Добавить группу</button></a>
                <hr><br>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Группа</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->name }}</td>
                            <td><a href="/groups/edit/{{ $group->id }}"><button type="button" class="btn btn-priamry">Редактировать</button></a></td>
                            <td><a href="/groups/delete/{{ $group->id }}"><button type="button" class="btn btn-danger">Удалить</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection