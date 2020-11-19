@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-4 mx-auto">
        <h3>Войти на сайт</h3>
        <form method="POST" action = " {{ route('auth.signin') }}" novalidate>
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
                <label for="password">Пароль</label>
                <input type="password" name = "password" class="form-control {{ $errors->has('password') ? 'is-invalid': ''}}" id="password" >
                 @if($errors->has('email'))
                <span class = "help block text-danger">
                {{ $errors->first('password') }}
                </span>
                @endif
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input name = "remember" type="checkbox" class="custom-control-input" id="remember">
              <label class="custom-control-label" for="remember">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
        <div class="col-lg-4 mx-auto">
        <h3>Регистрация</h3>
        <form method="POST" action = " {{ route('auth.signup') }}" novalidate>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="register_email">Почта</label>
                <input type="email" name = "register_email" class="form-control {{ $errors->has('register_email') ? 'is-invalid': ''}}" id="register_email" aria-describedby="emailHelp" value=" {{ Request::old('email')?: '' }}">
                @if($errors->has('register_email'))
                <span class = "help block text-danger">
                {{ $errors->first('register_email') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="register_username">Логин</label>
                <input type="text" name = "register_username" class="form-control {{ $errors->has('register_username') ? 'is-invalid': ''}}" id="register_username" value=" {{ Request::old('username')?: '' }}">
                @if($errors->has('register_password'))
                <span class = "help block text-danger">
                {{ $errors->first('register_username') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="register_password">Пароль</label>
                <input type="password" name = "register_password" class="form-control {{ $errors->has('register_password') ? 'is-invalid': ''}}" id="register_password" >
                 @if($errors->has('register_password'))
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
