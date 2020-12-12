
@include('front/inc/header')
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('information/about')}}">{{isset($content->title) ? $content->title : ''}}</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">{{isset($content->title) ? $content->title : ''}}</h1>
            <div class="row">
                <p>
                    {!!isset($content->description) ? $content->description : ''!!}
                </p>
            </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>

@include('front/inc/footer')
