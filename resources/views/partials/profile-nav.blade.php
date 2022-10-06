<div class="container">
    <div class="row store-nav-row">
        <a href="#">
            <h1 class="m-4 pr-5">MY CREATURES</h1>
        </a>
        <a href="{{route('my-creatures')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "all" ? "active" : ""}}">all</button>
        </a>
        <a href="{{route('my-creatures-adult')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "adults" ? "active" : ""}}">adults</button>
        </a>
        <a href="{{route('my-creatures-baby')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "babies" ? "active" : ""}}">babies</button>
        </a>
{{--        <a href="{{route('my-incubator')}}">--}}
{{--            <button class="btn btn-lg store-nav-btn m-4 {{$current == "eggs" ? "active" : ""}}">incubator</button>--}}
{{--        </a>--}}
        <a href="{{route('breeding-pairs')}}">
            <button class="btn btn-lg store-nav-btn m-4 {{$current == "breed" ? "active" : ""}}">breeding</button>
        </a>

    </div>
</div>

<div class="store-banner mt-2"><h2>ALL</h2></div>
