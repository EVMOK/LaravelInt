@extends('layouts.app')

@section('content')
    <div class="profile">

        <h2>Редактирование профиля</h2>

        <a class="btn btn-primary" role="button" href="{{ route('profile') }}">Назад</a>
        <a class="btn btn-primary" role="button" href="{{ route('profile.change.password') }}">Изменить пароль</a>

        <hr>

        {!! Form::open(['route'=>'profile.update']) !!}

        @method('PUT')

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

            {!! Form::label('Name:') !!}

            {!! Form::text('name', auth()->user()->name, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}

            <span class="text-danger">{{ $errors->first('name') }}</span>

        </div>


        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

            {!! Form::label('Email:') !!}

            {!! Form::email('email', auth()->user()->email, ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}

            <span class="text-danger">{{ $errors->first('email') }}</span>

        </div>

        <div class="form-group">

            <button class="btn btn-success">Отправить</button>

        </div>

        {!! Form::close() !!}
    </div>
@endsection
