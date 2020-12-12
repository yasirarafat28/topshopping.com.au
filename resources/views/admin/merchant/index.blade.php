
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
        
        <a class="btn btn-primary"  data-toggle="modal" data-target="#modal-create" ><i class="fa fa-plus" aria-hidden="true"></i> Create merchant</a>


        <div class="modal fade" id="modal-create">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New merchant</h4>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ url('admin/merchants') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                  {!! csrf_field() !!}

                  <div class="form-group ">
                      <label for="name" class="col-md-4 control-label">Name</label>
                      <div class="col-md-6">
                          <input class="form-control" name="name" type="text" id="name">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="email" class="col-md-4 control-label">Email</label>
                      <div class="col-md-6">
                          <input class="form-control" name="email" type="email" id="email">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Phone Number</label>
                      <div class="col-md-6">
                          <input class="form-control" name="phone" type="text" id="phone">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Shop URl</label>
                      <div class="col-md-6">
                          <input class="form-control" name="url" type="text" id="phone">

                      </div>
                  </div>
                    <div class="form-group ">
                        <label for="phone" class="col-md-4 control-label">Street</label>
                        <div class="col-md-6">
                            <input class="form-control" name="street" type="text" id="phone">

                        </div>
                    </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">City</label>
                      <div class="col-md-6">
                          <input class="form-control" name="city" type="text" id="phone">

                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">State</label>
                      <div class="col-md-6">
                          <input class="form-control" name="state" type="text" id="phone">

                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Country</label>
                      <div class="col-md-6">
                          <input class="form-control" name="country" type="text" id="phone">

                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Comment</label>
                      <div class="col-md-6">
                          <textarea name="comment" class="form-control summernote"></textarea>

                      </div>
                  </div>
                    <div class="form-group ">
                        <label for="phone" class="col-md-4 control-label">Logo</label>
                        <div class="col-md-6">
                            <input class="form-control" name="logo" type="file" id="phone">

                        </div>
                    </div>
                  <div class="form-group ">
                      <label for="password" class="col-md-4 control-label">Password</label>
                      <div class="col-md-6">
                          <input class="form-control" name="password" type="password" value="" id="password">
                          
                      </div>
                  </div>
                    <div class="form-group">
                      <div class="col-md-offset-4 col-md-4">
                          <input class="btn btn-primary btnmerchantcreate btnper" type="submit" value="Create">
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
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Timestamp</th>
            <th  class="action-td" >Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach($merchants as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->created_at}}</td>
            <td id="action" class="action-td">
              <a class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{$item->id}}" title="Edit merchant"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

              <a class="btn btn-primary" title="Show merchant"  data-toggle="modal" data-target="#modal-show{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>

              <a class="btn btn-danger" title="Delete merchant">
                {!! Form::open([
                   'method'=>'DELETE',
                   'url' => ['/admin/merchants', $item->id],
                   'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete ', array(
                     'type' => 'submit',
                     'class' => 'btn btn-danger btn-xs btnper',
                    'title' => 'Delete merchant',
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
                          <h4 class="modal-title">Update merchant</h4>
                      </div>
                      <div class="modal-body">
                        <div class="panel">
                          <form method="POST" class="form-horizontal modal-update-form" action="{{ url('admin/merchants/'.$item->id) }}"  accept-charset="UTF-8" enctype="multipart/form-data" >

                            {!! csrf_field() !!}
                            {{ method_field('PATCH') }}

                              <div class="form-group">
                                  <label for="name" class="col-md-4 control-label">Name</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="name" type="text" value="{{$item->name}}"  id="edit-name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="col-md-4 control-label">Email</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="email" type="email" value="{{$item->email}}" id="edit-email">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="phone" class="col-md-4 control-label">Phone</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="phone" type="text" value="{{$item->phone}}">
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Shop URl</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="url" type="text" value="{{$item->url}}" id="phone">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Street</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="street" value="{{$item->street}}" type="text" id="phone">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">City</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="city" value="{{$item->city}}" type="text" id="phone">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">State</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="state" value="{{$item->state}}" type="text" id="phone">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Country</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="country" value="{{$item->country}}" type="text" id="phone">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Comment</label>
                                  <div class="col-md-6">
                                      <textarea name="comment" class="form-control summernote">{{$item->comment}}</textarea>

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Logo</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="logo" type="file" id="phone">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="password" class="col-md-4 control-label">Password</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="password" type="password" value="" id="password">

                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="phone" class="col-md-4 control-label">Status</label>
                                  <div class="col-md-6">
                                    <select class="form-control" name="status">
                                      <option>Select an option</option>
                                      <option value="active" {{$item->status=='active'?'selected':''}} >Active</option>
                                      <option value="pending" {{$item->status=='pending'?'selected':''}} >Pending</option>
                                    </select>
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
                          <h4 class="modal-title">Show merchant</h4>
                      </div>
                      <div class="modal-body">
                        <div class="panel panel-default">
                          <table class="table table-striped">
                            <tr>
                              <td>Name</td>
                              <td>{{$item->name}}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>{{$item->email}}</td>
                            </tr>
                            <tr>
                              <td>Phone</td>
                              <td>{{$item->phone}}</td>
                            </tr>

                            <tr>
                              <td>Logo</td>
                              <td><img src="{{asset($item->logo)}}" alt="" style="width: 100px; "></td>
                            </tr>
                            
                            <tr>
                              <td>Gender</td>
                              <td>{{$item->gender}}</td>
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
