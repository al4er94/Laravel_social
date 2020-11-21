@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
       <h1> Садоводство {{$name}}!</h1>
        <p> - Оставайтесь на связи с другими садоводами</p>
    </div>
    <div class="col-lg-8 col-sm-12">
        @include('public.publicMenu') 
    </div>
</div>  
<div class="row mr-md-3">
    @include('public.news') 
</div>
@endsection