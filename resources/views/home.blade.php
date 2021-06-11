@extends('layouts.app')
@section('content')
    <div class="container">
        @if (!Auth::check())
            <div class="row">
                <div class="jumbotron">
                    <div class="container">
                        <h3>Уже зарегистрированны?</h3>
                        <p class="lead">
                            <a href="/login" class="btn btn-success btn-lg">Вход</a>
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection