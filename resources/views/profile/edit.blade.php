@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <h3>Редактирование</h3>
        <form method="POST" action = " {{ route('profile.edit') }}" novalidate>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="first_name" name = "first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid': ''}}" id="first_name" aria-describedby="emailHelp" value=" {{ Request::old('first_name')?: Auth::user()->first_name }}">
                @if($errors->has('first_name'))
                <span class = "help block text-danger">
                {{ $errors->first('first_name') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name = "last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid': ''}}" id="last_name" value=" {{ Request::old('last_name')?: Auth::user()->last_name }}">
                 @if($errors->has('last_name'))
                <span class = "help block text-danger">
                {{ $errors->first('last_name') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="location">Локация</label>
                <input type="text" name = "location" class="form-control {{ $errors->has('location') ? 'is-invalid': ''}}" id="last_name" value=" {{ Request::old('location')?: Auth::user()->location }}">
                 @if($errors->has('location'))
                <span class = "help block text-danger">
                {{ $errors->first('location') }}
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>    
@endsection