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
                            <td><a href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a></td>
                            <td><a href="{{ route('groups.edit', $group->id) }}"><button type="button" class="btn btn-priamry">Редактировать</button></a></td>
                            <td><a href="{{ route('groups.destroy', $group->id) }}"><button type="button" class="btn btn-danger">Удалить</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-8">
                    {{ $groups->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
