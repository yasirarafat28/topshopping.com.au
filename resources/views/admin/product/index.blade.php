
@include('admin/inc/header')
  <!-- Sidebar -->

@include('admin/inc/sidebar')
      
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      @if($errors->any())
          <div class="alert alert-danger">
              {{ $errors->first() }}
          </div>
      @endif

      <!-- Small boxes (Stat box) -->
      <div class="pb-4">
        
        <!--<a class="btn btn-primary"  data-toggle="modal" data-target="#modal-create" ><i class="fa fa-plus" aria-hidden="true"></i> Create product</a>-->
        <a class="btn btn-primary" href="{{url('/admin/product/create')}}" ><i class="fa fa-plus" aria-hidden="true"></i> Create product</a>

      </div>



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
              <a class="btn btn-primary" title="Show product"  data-toggle="modal" data-target="#modal-show{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>

              <a class="btn btn-danger" title="Delete product">
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
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Status</th>
            <th>Timestamp</th>
            <th  class="action-td" >Action</th>
          </tr>
        </tfoot>
      </table>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.container-fluid -->

  <!--  Footer -->

  @include('admin/inc/footer')
