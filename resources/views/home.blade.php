@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
       <h1> Садоводство {{$data['name']}}!</h1>
        <p> - Оставайтесь на связи с другими садоводами</p>
    </div>
    <div class="col-lg-8 col-sm-12">
        @include('public.publicMenu') 
    </div>
</div>  
<div class="colum news-block">
        @include('public.news') 
</div>
@endsection