
@include('front/inc/header')

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Merchant Login</li>
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well">
                            <h2>New Merchant</h2>
                            <p><strong>Register Account</strong></p>
                            <p>By creating an account you will be able to sell faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            <a href="{{url('merchant/register')}}" class="btn btn-primary">Continue</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h2>Returning Merchant</h2>
                            <p><strong>I am a returning Merchant</strong></p>
                            <form action="{{url('login')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>
                                    <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                    <a href="{{url('password/reset')}}">Forgotten Password</a></div>
                                <input type="submit" value="Login" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
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