@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Результаты по запросу: </h1>
        <p> {{ Request::input('search') }} </p>
    </div>
    @include('user.partial.result')
</div>    
@endsection