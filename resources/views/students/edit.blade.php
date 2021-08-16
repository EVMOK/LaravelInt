@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                   value="{{ old('name', $student->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="username" class="col-form-label">Login</label>
            <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                   value="{{ old('username', $student->user->name) }}" required>
            @if ($errors->has('username'))
                <span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" value="{{ old('email', $student->user->email) }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="group" class="col-form-label">Группа</label>
            {{Form::select('group', $groups, $student->group_id, ["class" => "form-control"])}}
            @if ($errors->has('group'))
                <span class="invalid-feedback"><strong>{{ $errors->first('group') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('Дата рождения') !!}
            {!! Form::text('date_born',\Carbon\Carbon::parse($student->date_born)->format('d.m.Y'), [
              'class' => 'date_born form-control',
              'id' => 'date_born',
            ]) !!}
            @if ($errors->has('date_born'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date_born') }}</strong></span>
            @endif
        </div>

        <table class="table table-bordered" id="dynamicTable">
            @foreach ($student->scores as $score)
            <tr>
                <th>Предмет</th>
                <th>Оценка</th>
            </tr>
            <tr>
                <td>{{Form::select('scores[0][discipline_id]', $disciplines, $score->discipline_id, ["class" => "form-control"])}}</td>
                <td><input type="text" name="scores[0][value]" value="{{$score->value}}" placeholder="" class="form-control" /></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                <input type="hidden" class="d-none" name="scores[0][student_id]" value="{{$student->id}}" />
                <input type="hidden" class="d-none" name="scores[0][id]" value="{{$score->id}}" />
            </tr>
            @endforeach
        </table>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $('.date_born').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    format: "dd.mm.yyyy",
                    autoclose: true,
                    orientation: "auto",
                });

            });
        </script>

        <script type="text/javascript">
            var i = 0;
            $("#add").click(function(){
                ++i;
                $("#dynamicTable").append('<tr>' +
                    '<td><select name="scores['+i+'][discipline_id]" class="form-control"> <option value="">Выберите предмет</option>' +
                       @foreach ($disciplines as $id => $value)
                        '<option value="{{ $id }}">{{ $value }}</option>' +
                        @endforeach
                        '</select></td>' +
                    '<td><input type="text" name="scores['+i+'][value]" placeholder="" class="form-control" /></td>' +
                    '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>' +
                    '<td><input type="hidden" class="d-none" name="scores['+i+'][student_id]" value="{{$student->id}}" /></td>' +
                    '<td><input type="hidden" class="d-none" name="scores['+i+'][id]" value="{{$score->id}}" /></td>'
                );
            });
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
        </script>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
