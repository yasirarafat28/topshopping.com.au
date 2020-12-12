
@include('front/inc/header')
  <div id="container">
    
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
          <!-- Slideshow Start-->
          <div class="slideshow single-slider owl-carousel">
            @foreach($sliders as $slider)
                <div class="item"> <a href="{{url($slider->link)}}"><img class="img-responsive" src="{{url($slider->image)}}" alt="banner 2" style="width:100%;" /></a> </div>
            @endforeach
          </div>
            @foreach($carousels as $carousel)

          
              <!-- Categories Product Slider Start -->
              <h3 class="subtitle">{{$carousel->keyword}} - <a class="viewall" href="{{url('/')}}">view all</a></h3>
              <div class="owl-carousel latest_category_carousel">
                  <?php
                  $keyword = $carousel->keyword;
                  if ($carousel->type=='latest')
                  {
                      $products = App\Product::with('merchant')->where(function ($query)  use ($keyword) {
                          $query->where('title', 'like', '%' . $keyword . '%');
                      })->where('status','active')->orderBy('id','DESC')->take($carousel->quantity)->get();
                  }
                  else{
                      $products = App\Product::with('merchant')->where(function ($query)  use ($keyword) {
                          $query->where('title', 'like', '%' . $keyword . '%');
                      })->where('status','active')->inRandomOrder()->take($carousel->quantity)->get();
                  }

                  ?>
                  @foreach($products as $key=>$item)
                    <div class="product-thumb">
                      <div class="image"><a href="#"  onclick="ProductRedirect({{$item->id}})"><img src="{{asset($item->image??'')}}" onerror="this.onerror=null;this.src='{{asset('images/NO_IMG.png')}}';" title=" {{$item->title}} " class="img-responsive" /></a></div>
                      <div class="caption">
                        <h4><a href="#" onclick="ProductRedirect({{$item->id}})">{{$item->title}}</a></h4>
                        <p class="product-price">

                          @if($item->discount)
                              $ {{$item->price- $item->discount}}
                              <del class="product-old-price"> $  {{$item->price}}</del>
                          @else
                              $ {{$item->price}}
                          @endif

                        </p>
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                      </div>
                      <div class="button-group">

                          <button class="btn-primary" type="button" onclick="ProductRedirect({{$item->id}})"><span>Buy Now</span></button>
                      </div>
                    </div>
                  @endforeach

              </div>
              <!-- Categories Product Slider End -->

          @endforeach
        </div>
        <!--Middle Part End-->
      </div>
    </div>
  </div>
  <!-- Feature Box Start-->
    <div class="container">
      <div class="custom-feature-box row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_1">
            <div class="title">Free Shipping</div>
            <p>Free shipping on order over $1000</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_2">
            <div class="title">Free Return</div>
            <p>Free return in 24 hour after purchasing</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_3">
            <div class="title">Gift Cards</div>
            <p>Give the special perfect gift</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_4">
            <div class="title">Reward Points</div>
            <p>Earn and spend with ease</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Feature Box End-->

@include('front/inc/footer')
