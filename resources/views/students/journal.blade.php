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
                    <td>@foreach ($student->scores->where('discipline_id', $discipline->id) as $score)
                            {{$score->value . ','}}
                        @endforeach</td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <td>Средняя сценка</td>
            @foreach ($disciplines as $discipline)
                <td>{{round($scores->where('discipline_id', $discipline->id)->avg('value'), 2)}}</td>
            @endforeach
        </tr>
    </table>
@endsection
