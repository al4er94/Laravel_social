@extends('templates.default')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <form method="POST" action="{{ route('status.post') }}">
      {{ csrf_field() }}
        <div class="form-group">
            <textarea name="status" class="form-control {{ $errors->has('status')? 'is-invalid' : '' }}"
                      placeholder="Что нового, {{ Auth::user()->getFirsNameOrUSerName() }}" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>
  </div>
</div>
<div class="row">
    <div class="col-lg-6"><hr>
        @if( ! $statuses->count() )
        <p> Пока нет записей на стене</p>
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
                    @if($status->user->id !== Auth::user()->id)
                        <li class="list-inline-item">
                            <a href="{{ route('status.like', ['status_id' =>$status->id ])}}">Лайк</a>
                        </li>
                    @endif
                    <li class="list-inline-item">
                       {{$status->likes->count()}}{{Illuminate\Support\Str::plural('like',$status->likes->count())}}
                    </li>
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
                                    <a href="{{ route('status.like', ['status_id' =>$reply->id ])}}">Лайк</a>
                                </li>
                            @endif
                            <li class="list-inline-item">
                                {{$reply->likes->count()}}{{Illuminate\Support\Str::plural('like',$reply->likes->count())}}
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach

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

            </div>
        </div>
        @endforeach
        {{ $statuses ->links() }}
        @endif
    </div> 
</div>
@endsection