@extends('templates.default')

@section('content')
<h1>404 ошибка</h1>    
<div class="row">
<p>Страница не найдена</p>    
<p>Вернутся на <a href = "{{ route('home') }}">Главную</a></p>  
</div>
@endsection