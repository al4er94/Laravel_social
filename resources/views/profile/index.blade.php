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
        @if(Auth::user()->hasFriendRequestPending($user))
        <p>В ожидании подтверждения запроса в друзья</p>
        @elseif(Auth::user()->hasFriendRequestReceived($user))
        <a href="{{ route('friend.accept', ['username' => $user->username]) }}" class="btn btn-primary mb-2">Подтвердить дружбу</a>
        @elseif(Auth::user()->isFriendWith($user))
        <p> {{ $user->getFirsNameOrUSerName() }} у Вас в друзьях</p>
        <form action="{{ route('friend.delete', ['username' => $user->username]) }}" method="POST">
            {{ csrf_field() }}
        <input type="submit" value="Удалить" class="btn btn-primary">   
        </form>
        @elseif( Auth::user()->id !== $user->id)
        <a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary mb-2">Добавить в друзья</a>
        @endif
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