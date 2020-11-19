<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container"> 
        <a class="navbar-brand" href=" {{ route('home') }}">Social</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @if(Auth::check())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Стена <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('friends.index') }}">Друзья</a>
                </li>
                <form class="form-inline my-2 ml-2 my-lg-0" action= " {{ route('search.results') }}" metod="GET" >
                    <input name="search"class="form-control mr-sm-2" type="search" placeholder="Что найти?" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </ul>
           @endif 
           <ul class="navbar-nav ml-auto">
               @if(Auth::check())
                <li class="nav-item active">
                    <!--Auth::check()->getNameOrUsername-->
                    <a class="nav-link" href="{{route('profile.index', ['username'=>Auth::user()->username]) }}">{{ Auth::user()->getNameOrUSername()}}</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Обновить профиль </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.signout') }}">Выйти</a>
                </li>
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('loginForm') }}">Личный кабинет</a>
                </li>
                @endif
            </ul>
           
           
        </div>
    </div>
</nav>