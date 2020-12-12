
@include('front/inc/header')
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Product</a></li>
        @if(isset($keyword))
          <li class="active"><a href="">{{$keyword}}</a></li>
        @endif
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">

          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="compare.html" id="compare-total">Product Compare (0)</a> </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">Sort By:</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                  <option value="" selected="selected">Default</option>
                  <option value="">Name (A - Z)</option>
                  <option value="">Name (Z - A)</option>
                  <option value="">Price (Low &gt; High)</option>
                  <option value="">Price (High &gt; Low)</option>
                  <option value="">Rating (Highest)</option>
                  <option value="">Rating (Lowest)</option>
                  <option value="">Model (A - Z)</option>
                  <option value="">Model (Z - A)</option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">Show:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                  <option value="" selected="selected">20</option>
                  <option value="">25</option>
                  <option value="">50</option>
                  <option value="">75</option>
                  <option value="">100</option>
                </select>
              </div>
            </div>
          </div>
          <br />


          <div class="row products-category">

            @foreach($products as $key=>$item)
                <div class="product-layout product-list col-xs-12">
                  <div class="product-thumb">
                    <div class="image"><a href="#" data-toggle="modal" data-target="#productModal{{$item->id}}"><img src="{{asset($item->image??'')}}" onerror="this.onerror=null;this.src='https://cdn.samsung.com/etc/designs/smg/global/imgs/support/cont/NO_IMG_600x600.png';" title=" {{$item->title}} " class="img-responsive" /></a></div>
                    <div>
                      <div class="caption">
                        <h4><a href="#" data-toggle="modal" data-target="#productModal{{$item->id}}">{{$item->title}} </a></h4>
                        <p class="description"> Latest Intel mobile architecture

                          Powered by the most advanced mobile processors from Intel, t..</p>
                        <p class="price" style="font-size: 20px;">


                            @if($item->discount)
                                <span class="price-new">{{$item->price- $item->discount}}</span>
                                <span class="price-old">{{$item->price}}</span>
                                <span class="saving">-{{(($item->discount/$item->price)*100)??0}}%</span>
                            @else
                                <span class="price-new"> {{$item->price}} AUD</span>
                            @endif
                        </p>
                        <div style="margin-bottom: 10px;">
                            <img src="{{asset($item->merchant->logo)}}" alt="" class="main-btn add-to-cart" style="width: 50%;max-height:60px;">
                        </div>
                      </div>
                      <div class="button-groups">
                        <button class="btn btn-primary" style="padding-left: 15%; padding-right: 15%;" type="button" onclick="ProductRedirect({{$item->id}})"><span><i class="fa fa-shopping-cart" ></i>  Buy Now</span></button>

                      </div>
                    </div>
                  </div>
                </div>


                  <!--Modal -->
                  <div class="modal fade" id="productModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header text-success">
                                  <h5 class="modal-title" id="exampleModalLabel">{{$item->title}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">

                                  <div class="product product-details clearfix">
                                      <div class="col-md-6">
                                          <div id="product-main-view">
                                              <img src="{{$item->image ? $item->image : asset('img/default-image.jpg')}}" alt="" style="max-width: 90%;display: block;margin:0 auto;">
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="product-body">
                                              <h4 class="product-name">{{$item->title}}</h4>
                                              <h3 class="product-price">
                                                  @if($item->discount)
                                                      $ {{$item->price- $item->discount}}
                                                      <del class="product-old-price">   {{$item->price}}</del>
                                                  @else
                                                       {{$item->price}}
                                                  @endif
                                                   AUD
                                              </h3>
                                              <p><strong>Shop :</strong> {{$item->merchant->name}}</p>
                                              <img src="{{asset($item->merchant->logo)}}" alt="{{$item->merchant->name}}" title="{{$item->merchant->name}}" style="width: 120px;">
                                              <p>{{$item->description}}</p>

                                              <br>

                                              <div class="product-btns">
                                                  <button class="main-btn add-to-cart"><i class="fa fa-heart"> Wishlist</i></button>
                                              <!--<a class="primary-btn add-to-cart" target="_blank" href="{{$item->url}}"><i class="fa fa-shopping-cart"></i> Buy Now</a>-->
                                                  <a class="btn btn-primary" style="padding-left: 20%; padding-right: 20%;" onclick="ProductRedirect({{$item->id}})"><i class="fa fa-shopping-cart" ></i> Buy Now</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--End Modal -->
            @endforeach
          </div>
          <div class="row">
              <div class="pull-right">

                  <div class="text-left">
                      {!! $products->render() !!}
                  </div>

              </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@include('front/inc/footer')
