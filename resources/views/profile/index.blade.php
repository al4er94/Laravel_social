@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <img src="{{$user->getAvatarUrl()}}" class="mr-3" alt="...">
        <div class="media-body">
            <h6 class="mt-0 mb-1">{{$user ->first_name.' '.$user->last_name }}</h6>
        </div>
    </div>
    <div class="col-lg-6 col-lg-offset-3">
        <h5>Друзья {{ $user->getFirsNameOrUSerName() }}</h5>
        @if(!$user->friends()->count())
        <p> {{ $user->getFirsNameOrUSerName() }} нет друзей</p>
        @else
            @foreach($user->friends() as $user)
             @include('user.partial.account')
            @endforeach
        @endif
    </div>
</div>    
@endsection