@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/groups/{{ $group->id }}" method="POST" role="form">
                    {{ csrf_field() }}
                    <legend>Редактировать</legend>

                    <div class="form-group">
                        <input name="name" type="text" class="form-control" id="" value="{{ $group->name }}">
                    </div>


                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection