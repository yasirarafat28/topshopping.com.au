
@include('front/inc/header')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Merchant Account</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div id="content" class="col-sm-9 "  style="padding: 1em 5em;border: 1px solid #ddd;">

                <div class=" col-sm-12 text-center text-danger" style="padding:80px;border: 1px solid #ddd;">
                    <h4>Hi! {{Auth::user()->name}}</h4>

                </div>
            </div>


            <aside id="column-right" class="col-sm-3 hidden-xs">

                @include('front/inc/merchant-sidebar')
            </aside>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@include('front/inc/footer')