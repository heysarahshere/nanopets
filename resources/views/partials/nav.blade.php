<div class="ombre-nav col-12">
    <div class="row align-items-center py-2 justify-content-end">
        @if(Auth::check())
            <?PHP $user = Auth::user(); ?>
            <a class="nav-link nav-account" href="{{route('profile')}}">
                <p class="nav-account">Welcome, {{$user->username}}!</p>
            </a>
            <a class="nav-link nav-account" href="#">settings</a>
            <form method="POST" action="{{route('sign-out')}}">{{ csrf_field() }}
                <button class="btn btn-sm rev-ombre-btn mr-2" type="submit">sign out</button>
            </form>
        @else
            <div class="col-12 text-right">
                <a  href="{{route('get-sign-in')}}"><button class="btn btn-sm rev-ombre-btn">sign in</button></a>
                <a href="{{route('get-sign-up')}}"><button class="btn btn-sm ombre-btn">sign up</button></a>
            </div>
        @endif
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-light lower-nav">
    <a><img class="navbar-brand nav-logo pt-2" src="{{asset(('images/nanopets-logo.png'))}}"/></a>
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('about')}}">about</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('featured')}}">store</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">creatures</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">support</a>
            </li>
        </ul>
    </div>
</nav>
