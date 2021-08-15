@extends('layouts.app')

@section('content')
    <table class="table table-bordered" id="dynamicTable">
            <tr>
                <th>Студент/Предмет</th>
                @foreach ($disciplines as $discipline)
                    <th>{{$discipline->name}}</th>
                @endforeach
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td><a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a></td>
                    @foreach ($disciplines as $discipline)
                        <td>{{$student->score($student->id, $discipline->id)}}</td>
                    @endforeach
            @endforeach
    </table>
@endsection
