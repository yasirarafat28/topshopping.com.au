
@include('front/inc/header')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Merchant Products</li>
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
                <h2>Your Products <span style="margin-left: 40px;"></span> <a  class="btn btn-primary"  href="{{route('add-product')}}"><i class="fa fa-plus"></i>  Add Product</a></h2>
                @if(sizeof($products) <1)
                    <div class=" col-sm-12 text-center mt-5" style="padding:80px;border: 1px solid #ddd;">
                        <h4 class="text-danger" style="text-transform: uppercase;"><i class="fa fa-exclamation-triangle"></i><strong> Sorry! </strong> Found No Product</h4>

                    </div>
                @else
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>ShopID</th>
                            <th>Shop</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            <th  class="action-td" >Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $item)
                            <tr>
                                <td><img src="{{$item->image ? url($item->image) : asset('img/default-image.jpg')}}" height="42" width="42"></td>

                                <td>{{$item->merchant->merchantID}}</td>
                                <td>{{$item->merchant->name}}</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    <a href="{{$item->url}}">{{$item->url}}</a>
                                </td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->created_at}}</td>
                                <td id="action" class="action-td">
                                <!--<a class="btn btn-primary" href="{{url('admin/product/'.$item->id.'/edit')}}" title="Edit product"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
              -->
                                    <a class="main-btn" title="Show product"  data-toggle="modal" data-target="#modal-show{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>

                                    <a class="main-btn" title="Delete product">
                                        {!! Form::open([
                                           'method'=>'DELETE',
                                           'url' => ['/admin/products', $item->id],
                                           'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete ', array(
                                             'type' => 'submit',
                                             'class' => 'btn btn-danger btn-xs btnper',
                                            'title' => 'Delete user',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                             )) !!}
                                        {!! Form::close() !!}
                                    </a>

                                    <!--Show Modal -->
                                    <div class="modal fade" id="modal-show{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Show product</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel panel-default">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td>ShopID</td>
                                                                <td>{{$item->merchant->merchantID}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ShopID</td>
                                                                <td>{{$item->merchant->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ProductID</td>
                                                                <td>{{$item->ref}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Title</td>
                                                                <td>{{$item->title}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Description</td>
                                                                <td>{{$item->description}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>URL</td>
                                                                <td>{{$item->url}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price</td>
                                                                <td>{{$item->price}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Image</td>
                                                                <td><img src="{{asset($item->image)}}" height="42" width="42"></td>
                                                            </tr>


                                                            <tr>
                                                                <td>Status</td>
                                                                <td>{{$item->status}}</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Timestamp</td>
                                                                <td>{{$item->created_at}}</td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--Show ModalEnd -->

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>ShopID</th>
                            <th>Shop</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            <th  class="action-td" >Action</th>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="row">
                        <div class="text-left">
                            {!! $products->render() !!}
                        </div>
                    </div>
                @endif
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