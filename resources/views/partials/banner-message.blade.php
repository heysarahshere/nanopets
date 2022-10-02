@if(Session::has('banner-message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert mb-0 text-center banner-ombre">
                <p style="color: #ffffff">{{Session('banner-message')}}</p>
            </div>
        </div>
    </div>

@endif
