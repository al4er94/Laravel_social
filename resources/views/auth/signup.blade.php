@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-4 mx-auto">
        <h3>Регистрация</h3>
        <form method="POST" action = " {{ route('auth.signup') }}" novalidate>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" name = "email" class="form-control {{ $errors->has('email') ? 'is-invalid': ''}}" id="email" aria-describedby="emailHelp" value=" {{ Request::old('email')?: '' }}">
                @if($errors->has('email'))
                <span class = "help block text-danger">
                {{ $errors->first('email') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="username">Логин</label>
                <input type="text" name = "username" class="form-control {{ $errors->has('username') ? 'is-invalid': ''}}" id="username" value=" {{ Request::old('username')?: '' }}">
                @if($errors->has('email'))
                <span class = "help block text-danger">
                {{ $errors->first('username') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name = "password" class="form-control {{ $errors->has('password') ? 'is-invalid': ''}}" id="password" >
                 @if($errors->has('email'))
                <span class = "help block text-danger">
                {{ $errors->first('password') }}
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Создать аккаунт</button>
        </form>
    </div>
</div>
@endsection