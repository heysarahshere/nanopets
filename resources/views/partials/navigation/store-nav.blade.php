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
        <div class="col-3 m-auto p-2">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="width: 80%">
                    Age:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">Egg</button>
                    <button class="dropdown-item" type="button">Baby</button>
                    <button class="dropdown-item" type="button">Adult</button>
                </div>
            </div>
        </div>        <div class="col-3 m-auto p-2">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="width: 80%">
                    Tier:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">Bronze</button>
                    <button class="dropdown-item" type="button">Silver</button>
                    <button class="dropdown-item" type="button">Gold</button>
                    <button class="dropdown-item" type="button">Platinum</button>
                    <button class="dropdown-item" type="button">Diamond</button>
                </div>
            </div>
        </div>
        <div class="col-3 m-auto p-2">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="width: 80%">
                    Element:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">Fire</button>
                    <button class="dropdown-item" type="button">Water</button>
                    <button class="dropdown-item" type="button">Earth</button>
                    <button class="dropdown-item" type="button">Air</button>
                    <button class="dropdown-item" type="button">Other</button>
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
        <div class="col-3 m-auto p-2">
            <form class="d-flex">
                <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>

</div>
