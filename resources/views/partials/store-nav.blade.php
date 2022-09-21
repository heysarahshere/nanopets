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
        <a href="{{route('eggs')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "eggs" ? "active" : ""}}">eggs</button>
        </a>
        <a href="#">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "housing" ? "active" : ""}}">housing</button>
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
                <i class="fa-solid fa-cart-shopping m-4" style="font-size: 40px; color: #0a3c60"></i>
            @endif
        @endif
    </div>
</div>

<div class="store-banner mt-2"><h2>{{ $category ?? ""}}</h2></div>
