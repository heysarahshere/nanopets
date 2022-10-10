<div class="container">
    <div class="row store-nav-row">
        <a href="{{route('featured')}}">
            <h1 class="m-4 pr-5">STORE</h1>
        </a>
        <a href="{{route('potions')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "potions" ? "active" : ""}}">potions</button>
        </a>
        <a href="{{route('foods')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "foods" ? "active" : ""}}">foods</button>
        </a>
        <a href="{{route('housing')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "housing" ? "active" : ""}}">housing</button>
        </a>
        <a href="{{route('eggs')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "eggs" ? "active" : ""}}">eggs</button>
        </a>
        <a href="{{route('adoptable')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "adopt" ? "active" : ""}}">adopt</button>
        </a>
        @if(Auth::check())
            <?PHP $user = Auth::user(); ?>
            @if($user->isAdmin())
                <div class="add-button">
                    <a href="{{route('add-food')}}" class="btn btn-lg ombre-btn"><i class="fa fa-plus"
                                                                                    aria-hidden="true"></i>&nbsp;New
                        Food</a>
                </div>
            @else
                {{--                <i class="fa-solid fa-cart-shopping m-4" style="font-size: 40px; color: #0a3c60"></i>--}}
            @endif
        @endif
    </div>
</div>

<div class="store-banner mt-2"><h2>{{ $category ?? ""}}</h2></div>

<div class="container store-search-bar">
    <div class="row">
        <div class="col-4 m-auto p-2">
            <div class="dropdown">
                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown trigger
                </button>
                <div class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a class="dropdown-item" href="#">Bronze</a></li>
                    <li><a class="dropdown-item" href="#">Silver</a></li>
                    <li><a class="dropdown-item" href="#">Gold</a></li>
                    <li><a class="dropdown-item" href="#">Platinum</a></li>
                    <li><a class="dropdown-item" href="#">Diamond</a></li>
                </div>
            </div>
            {{--            <div class="dropdown">--}}
            {{--                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}
            {{--                    Tier:--}}
            {{--                </button>--}}
            {{--                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
            {{--                    <li><a class="dropdown-item" href="#">Bronze</a></li>--}}
            {{--                    <li><a class="dropdown-item" href="#">Silver</a></li>--}}
            {{--                    <li><a class="dropdown-item" href="#">Gold</a></li>--}}
            {{--                    <li><a class="dropdown-item" href="#">Platinum</a></li>--}}
            {{--                    <li><a class="dropdown-item" href="#">Diamond</a></li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}
            {{--            <div class="btn-group m-auto">--}}
            {{--                <button class="btn btn-light btn-sm dropdown-toggle mx-5" type="button" data-bs-toggle="dropdown"--}}
            {{--                        aria-expanded="false">--}}
            {{--                    Tier:--}}
            {{--                </button>--}}
            {{--                <ul class="dropdown-menu">--}}
            {{--                    <li>Bronze</li>--}}
            {{--                    <li>Silver</li>--}}
            {{--                    <li>Gold</li>--}}
            {{--                    <li>Platinum</li>--}}
            {{--                    <li>Diamond</li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}
        </div>
        <div class="col-4 m-auto p-2">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">Action</button>
                    <button class="dropdown-item" type="button">Another action</button>
                    <button class="dropdown-item" type="button">Something else here</button>
                </div>
            </div>
{{--            <div class="btn-group m-auto">--}}
{{--                <button class="btn btn-light btn-sm dropdown-toggle mx-5" type="button" data-bs-toggle="dropdown"--}}
{{--                        aria-expanded="false">--}}
{{--                    Element:--}}
{{--                </button>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li>Fire</li>--}}
{{--                    <li>Water</li>--}}
{{--                    <li>Earth</li>--}}
{{--                    <li>Air</li>--}}
{{--                    <li>Other</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
        <div class="col-4 m-auto p-2">
            <form class="d-flex">
                <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>

</div>
