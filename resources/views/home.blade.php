@extends('layouts.app')

@section('content')

    <div class="home">
        @role('Admin')
        @include('dashboard.admin')
        @endrole

        @role('Student')
        @include('dashboard.student')
        @endrole
    </div>

@endsection
