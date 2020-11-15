@extends('templates.default')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <img src="{{$user->getAvatarUrl()}}" class="mr-3" alt="...">
        <div class="media-body">
            <h6 class="mt-0 mb-1">{{$user ->first_name.' '.$user->last_name }}</h6>
        </div>
        <hr>
        @if( ! $statuses->count() )
            <p> {{ $user->getFirsNameOrUSerName()}}</p>
            @else
            @foreach($statuses as $status)
            <div class="media">
                <a class="mr-3" href="{{ route('profile.index', $status -> user->username) }}">
                    <img class="media-object rounded" src="{{ $status -> user -> getAvatarUrl()  }}"
                         alt="{{ $status -> user -> getFirsNameOrUSerName() }}">
                </a>
                <div class="media-body">
                    <h4>
                        <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status -> user -> getNameOrUSername() }}</a>
                    </h4>
                    <p>{{ $status ->body }}</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">{{ $status ->created_at->diffForHumans() }}</li>
                        <li class="list-inline-item">
                            <a href="#">Лайк</a>
                        </li>
                        <li class="list-inline-item">10 Лайков</li>
                    </ul>
                    @foreach($status->replies as $reply)
                    <div class="media">
                        <a class="mr-3" href="{{ route('profile.index', $status -> user->username) }}">
                            <img class="media-object rounded" src="{{ $status -> user -> getAvatarUrl()  }}"
                                 alt="{{ $status -> user -> getFirsNameOrUSerName() }}">
                        </a>
                        <div class="media-body">
                            <h4>
                                <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status -> user -> getNameOrUSername() }}</a>
                            </h4>
                            <p>{{ $reply ->body }}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">{{ $reply ->created_at->diffForHumans() }}</li>
                                @if($reply->user->id !== Auth::user()->id)
                                    <li class="list-inline-item">
                                        <a href="{{ route('status.like', ['status_id' =>$status->id ])}}">Лайк</a>
                                    </li>
                                @endif
                                <li class="list-inline-item">
                                    {{$reply->likes->count()}}{{Illuminate\Support\Str::plural('like',$reply->likes->count())}}
                                </li
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    @if($authUSerInFriends|| Auth::user()->id == $status->user->id)
                    <form method="POST" action="{{ route('status.reply', ['statusId' => $status -> id])}}" class="mb-4">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="reply-{{$status -> id}}" class="form-control{{ $errors->has("reply-$status->id") ? ' is-invalid' : '' }}"
                                      placeholder="Прокомментировать" rows="3"></textarea>
                            @if ($errors->has("reply-{$status->id}"))
                                <span class="invalid-feedback">
                                  {{ $errors->first("reply-{$status->id}") }}
                                </span>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm" value="Ответить">
                    </form>
                     @endif
                </div>
            </div>
            @endforeach
            
        @endif
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