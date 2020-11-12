<div class="col-lg-12">
    <h5 class="mt-0 mb-1">Результаты</h5>
    <ul class="list-unstyled">
        @foreach( $users as $user)
      <li class="media mb-2">
        <img src="{{$user->getAvatarUrl()}}" class="mr-3" alt="...">
        <div class="media-body">
          <h6 class="mt-0 mb-1">{{$user ->first_name.' '.$user->last_name}}</h6>        
          <a href="{{ route('profile.index', ['username' => $user->username])}}"> {{$user ->username}} </a>
        </div>
      </li>
      @endforeach
    </ul>
</div>