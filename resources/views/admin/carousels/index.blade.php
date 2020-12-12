
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
        
        <a class="btn btn-primary"  data-toggle="modal" data-target="#modal-create" ><i class="fa fa-plus" aria-hidden="true"></i> Create User</a>


        <div class="modal fade" id="modal-create">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New User</h4>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ url('admin/carousels') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                  {!! csrf_field() !!}

                  <div class="form-group ">
                      <label for="name" class="col-md-4 control-label">Keyword</label>
                      <div class="col-md-6">
                          <input class="form-control" name="keyword" type="text" id="name">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="name" class="col-md-4 control-label">Type</label>
                      <div class="col-md-6">
                          <select name="type" class="form-control">
                              <option value="random">Fetch Random</option>
                              <option value="latest">Fetch Latest</option>
                          </select>

                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="email" class="col-md-4 control-label">Quantity</label>
                      <div class="col-md-6">
                          <input class="form-control" name="quantity" type="number" id="email">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="email" class="col-md-4 control-label">Sort Order</label>
                      <div class="col-md-6">
                          <input class="form-control" name="sort_order" type="number" id="email">

                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="email" class="col-md-4 control-label">Page</label>
                      <div class="col-md-6">
                          <select name="page" class="form-control">
                              <option value="home">Home Page</option>
                          </select>

                      </div>
                  </div>
                    <div class="form-group ">
                        <label for="email" class="col-md-4 control-label">HTML Content</label>
                        <div class="col-md-6">
                            <textarea name="overview" class="form-control summernote"></textarea>

                        </div>
                    </div>
                  <div class="form-group">
                      <div class="col-md-offset-4 col-md-4">
                          <input class="btn btn-primary btnusercreate btnper" type="submit" value="Create">
                      </div>
                  </div>
                </form>
              </div>                    
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>



      <table class="table table-striped table-hover" id="example">
        <thead>
          <tr>
            <th>Keyword</th>
            <th>Type</th>
            <th>Page</th>
            <th>Quantity</th>
            <th>Timestamp</th>
            <th  class="action-td" >Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach($carousels as $item)
          <tr>
            <td>{{$item->keyword}}</td>
            <td>{{$item->type}}</td>
            <td>{{$item->page}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->created_at}}</td>
            <td id="action" class="action-td">
              <a class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{$item->id}}" title="Edit User"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

              <a class="btn btn-primary" title="Show User"  data-toggle="modal" data-target="#modal-show{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>

              <a class="btn btn-danger" title="Delete User">
                {!! Form::open([
                   'method'=>'DELETE',
                   'url' => ['/admin/carousels', $item->id],
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

              <!--Edit Modal -->
                <div class="modal fade" id="modal-edit{{$item->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Update User</h4>
                      </div>
                      <div class="modal-body">
                        <div class="panel">
                          <form method="POST" class="form-horizontal modal-update-form" action="{{ url('admin/carousels/'.$item->id) }}"  accept-charset="UTF-8" enctype="multipart/form-data" >

                            {!! csrf_field() !!}
                            {{ method_field('PATCH') }}

                              <div class="form-group ">
                                  <label for="name" class="col-md-4 control-label">Keyword</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="keyword" type="text" value="{{$item->keyword}}">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="name" class="col-md-4 control-label">Type</label>
                                  <div class="col-md-6">
                                      <select name="type" class="form-control">
                                          <option value="random"  {{$item->type=='random'? 'selected':''}}  >Fetch Random</option>
                                          <option value="latest"  {{$item->type=='latest'? 'selected':''}}>Fetch Latest</option>
                                      </select>

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="email" class="col-md-4 control-label">Quantity</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="quantity" type="number" id="email"  value="{{$item->quantity}}">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="email" class="col-md-4 control-label">Sort Order</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="sort_order" type="number"  value="{{$item->sort_order}}">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="email" class="col-md-4 control-label">Page</label>
                                  <div class="col-md-6">
                                      <select name="page" class="form-control">
                                          <option value="home" {{$item->page=='home'? 'selected':''}} >Home Page</option>
                                      </select>

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="email" class="col-md-4 control-label">HTML Content</label>
                                  <div class="col-md-6">
                                      <textarea name="overview"class="form-control summernote">{{$item->overview}}</textarea>

                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-offset-4 col-md-4">
                                      <input id="update" class="btn btn-primary btnper" type="submit" value="Update">
                                  </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!--Edit ModalEnd -->


                <!--Show Modal -->
                <div class="modal fade" id="modal-show{{$item->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Show Carousel</h4>
                      </div>
                      <div class="modal-body">
                        <div class="panel panel-default">
                          <table class="table table-striped">
                            <tr>
                              <td>Keyword</td>
                              <td>{{$item->keyword}}</td>
                            </tr>
                            <tr>
                              <td>Type</td>
                              <td>{{$item->type}}</td>
                            </tr>
                            <tr>
                              <td>Page</td>
                              <td>{{$item->page}}</td>
                            </tr>

                            <tr>
                              <td>Quantity</td>
                              <td>{{$item->quantity}}</td>
                            </tr>
                            <tr>
                              <td>Sort Order</td>
                              <td>{{$item->sort_order}}</td>
                            </tr>
                            <tr>
                              <td>Overview</td>
                              <td>{!! $item->overview !!}</td>
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
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Timestamp</th>
            <th class="action-td">Action</th>
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
