<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="@if(isset($meta_description) && $meta_description)
    {{$meta_description}}
    @else
    {{App\Setting::setting()->meta_description}}
    @endif">

    <meta name="google-site-verification" content="OdeYRhwG0oozjKLpsaIq3xNoSIvhNMK66v-U-xudLFc" />

    <meta name='keywords' content='topshopping.com.au, Australia Price Comparison, Fashion, Product, Compare Product Price, {{isset($keyword) ?$keyword: ''}}, {{isset($keyword_entry->relative_keyword)? $keyword_entry->relative_keyword:''}}'>
    <meta name='subject' content="{{App\Setting::setting()->tagline}}">

    <meta name='url' content='{{Illuminate\Support\Facades\URL::current()}}'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PKCMFRF');</script>
    <!-- End Google Tag Manager -->


    <title>
        @if(isset($meta_title) && $meta_title)
            {{$meta_title}} | {{App\Setting::setting()->tagline}}
        @else

            @if(isset($keyword))
                Best {{$keyword}} {{App\Setting::setting()->tagline}}
            @else
                {{App\Setting::setting()->tagline}}
            @endif
        @endif
        | topshopping.com.au
    </title>
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/js/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/css/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/css/stylesheet.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/css/owl.transitions.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontNew/css/stylesheet-skin2.css')}}" />
    <!-- CSS Part End-->

    <style>
        #header .header-row {
            background-color: #fff !important;
        }
        #menu.navbar{
            background-color: orangered;
            font-weight: 600;
        }

        .dropdown-menu a{
            color: black;
        }
    </style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PKCMFRF"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <!--<li class="mobile"><i class="fa fa-phone"></i>+91 9898777656</li>-->
                                <li class="email"><a href="mailto:support@topshopping.com.au"><i class="fa fa-envelope"></i>support@topshopping.com.au</a></li>

                            </ul>
                        </div>
                    </div>
                    <div id="top-links" class="nav pull-right flip">
                        <ul>
                            <li><a href="{{url('merchant/login')}}">Login</a></li>
                            <li><a href="{{url('merchant/register')}}">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-12 col-xs-12 inner">
                        <div id="logo" style="padding: 20px 0px;"><a href="{{url('/')}}"><img  class="img-responsive" src="{{asset('images/logo.png')}}" title="topshopping.com.au" alt="MarketShop" style="height: 60px;" /></a></div>
                    </div>
                    <!-- Logo End -->
                    <!-- Mini Cart End-->
                    <!-- Search Start-->
                    <div class="col-table-cell col-lg-9 col-md-9 col-sm-12 col-xs-12 inner">
                        <form method="POST" action="{{route('searchSubmit')}}">
                            {{csrf_field()}}
                            <div id="search" class="input-group">
                                <input id="filter_name" type="text" name="search" placeholder="Find the best price and save money" value="{{isset($keyword) ? $keyword : ''}}" autocomplete="false"class="form-control input-lg" />
                                <button type="submit" onclick="this.form.submit();" class="button-search" ><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Search End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main Menu Start-->

        <nav id="menu" class="navbar">
            <div class="navbar-header"> <span class="visible-xs visible-sm"> Categories <b></b></span></div>
            <div class="container">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="home_link" title="Home" href="{{url('/')}}">Home</a></li>

                        <?php
                        $nav_categories = App\Category::where('status','active')->where('type','nav')->where('level',1)->get();
                        $side_categories = App\Category::where('status','active')->where('type','left_side')->where('level',1)->get();
                        ?>

                    @foreach($nav_categories as $key=>$nav)
                            <?php
                            $sub_categories = App\Category::CategoryListByParent($nav->id);
                            ?>

                            @if(sizeof($sub_categories)>0)

                            <li class="menu_brands dropdown"><a href="#">{{$nav->title}} </a>
                                <div class="dropdown-menu">
                                    @foreach($sub_categories as $sub_category)
                                        <fieldset>
                                            <legend class="scheduler-border"><a href="{{url($sub_category->url)}}">{{$sub_category->title}}</a></legend>
                                            <?php
                                            $sub_sub_categories = App\Category::CategoryListByParent($sub_category->id);
                                            ?>

                                            <div class="clearfix">
                                                @if(sizeof($sub_sub_categories) > 0)
                                                    @foreach($sub_sub_categories as $sub_sub_category)
                                                        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6 mb-2" style="height: 100px;">

                                                            <div class="col-md-12">
                                                                <a href="{{url($sub_sub_category->url??'')}}">
                                                                    <img id="nav-category-id-{{$sub_sub_category->id}}" src="" style="width: 100%;height: 30px;"/>
                                                                </a>
                                                            </div>
                                                            <br>
                                                            <a href="{{url($sub_sub_category->url??'')}}">{{$sub_sub_category->title}}</a>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <a href="{{url($sub_category->url??'')}}">{{$sub_category->title}}</a>
                                                @endif

                                            </div>
                                        </fieldset>

                                    @endforeach
                                </div>
                            </li>
                            @else
                                <li>

                                    <a href="{{url($sub_category->url)}}">{{$sub_category->title}}</a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Menu End-->
    </div>
