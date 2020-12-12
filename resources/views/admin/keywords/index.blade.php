
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
                <h4 class="modal-title">Create New Keyword</h4>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ url('admin/keywords') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                  {!! csrf_field() !!}

                  <div class="form-group ">
                      <label for="name" class="col-md-4 control-label">Keyword</label>
                      <div class="col-md-6">
                          <input class="form-control" name="keyword" type="text" id="name">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="email" class="col-md-4 control-label">Price Greater</label>
                      <div class="col-md-6">
                          <input class="form-control" name="high_price" type="number" step="any">
                          
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="email" class="col-md-4 control-label">Price Less</label>
                      <div class="col-md-6">
                          <input class="form-control" name="low_price" type="number" step="any">

                      </div>
                  </div>

                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Meta Description</label>
                      <div class="col-md-6">
                          <textarea name="meta_description" class="form-control"></textarea>

                      </div>
                  </div>

                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Negative Keywords</label>
                      <small>(use comma(,) as separator)</small>
                      <div class="col-md-6">
                          <textarea name="negative_keyword" class="form-control"></textarea>

                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="phone" class="col-md-4 control-label">Related Keywords</label>
                      <small>(use comma(,) as separator)</small>
                      <div class="col-md-6">
                          <textarea name="relative_keyword" class="form-control"></textarea>

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
            <th>Keyword</th>
            <th>Price Greater</th>
            <th>Price Less</th>
            <th>Timestamp</th>
            <th  class="action-td" >Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach($keywords as $item)
          <tr>
            <td>{{$item->keyword}}</td>
            <td>{{$item->high_price}}</td>
            <td>{{$item->low_price}}</td>
            <td>{{$item->updated_at}}</td>
            <td id="action" class="action-td">
              <a class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{$item->id}}" title="Edit merchant"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

              <a class="btn btn-primary" title="Show merchant"  data-toggle="modal" data-target="#modal-show{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>

              <a class="btn btn-danger" title="Delete merchant">
                {!! Form::open([
                   'method'=>'DELETE',
                   'url' => ['/admin/keywords', $item->id],
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
                          <form method="POST" class="form-horizontal modal-update-form" action="{{ url('admin/keywords/'.$item->id) }}"  accept-charset="UTF-8" enctype="multipart/form-data" >

                            {!! csrf_field() !!}
                            {{ method_field('PATCH') }}

                              <div class="form-group ">
                                  <label for="name" class="col-md-4 control-label">Keyword</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="keyword" type="text" value="{{$item->keyword}}" id="name">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="email" class="col-md-4 control-label">Price Greater</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="high_price" type="number" step="any" value="{{$item->high_price}}">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="email" class="col-md-4 control-label">Price Less</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="low_price" type="number" step="any" value="{{$item->low_price}}">

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="name" class="col-md-4 control-label">Meta Title</label>
                                  <div class="col-md-6">
                                      <input class="form-control" name="meta_title" type="text" value="{{$item->meta_title}}" id="name">

                                  </div>
                              </div>

                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Meta Description</label>
                                  <div class="col-md-6">
                                      <textarea name="meta_description" class="form-control">{{$item->meta_description}}</textarea>

                                  </div>
                              </div>

                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Negative Keywords</label>
                                  <small>(use comma(,) as separator)</small>
                                  <div class="col-md-6">
                                      <textarea name="negative_keyword" class="form-control">{{$item->negative_keyword}}</textarea>

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="phone" class="col-md-4 control-label">Related Keywords</label>
                                  <small>(use comma(,) as separator)</small>
                                  <div class="col-md-6">
                                      <textarea name="relative_keyword" class="form-control">{{$item->relative_keyword}}</textarea>

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
                          <h4 class="modal-title">Show Keyword</h4>
                      </div>
                      <div class="modal-body">
                        <div class="panel panel-default">
                          <table class="table table-striped">
                            <tr>
                              <td>Keyword</td>
                              <td>{{$item->keyword}}</td>
                            </tr>
                            <tr>
                              <td>Price Greater</td>
                              <td>{{$item->high_price}}</td>
                            </tr>
                            <tr>
                              <td>Price Less</td>
                              <td>{{$item->low_price}}</td>
                            </tr>
                            <tr>
                              <td>Meta Title</td>
                              <td>{{$item->meta_title}}</td>
                            </tr>
                            <tr>
                              <td>Meta Description</td>
                              <td>{{$item->meta_description}}</td>
                            </tr>
                            <tr>
                              <td>Negative Keyword</td>
                              <td>{{$item->negative_keyword}}</td>
                            </tr>
                            <tr>
                              <td>Related Keyword</td>
                              <td>{{$item->relative_keyword}}</td>
                            </tr>
                            <tr>
                              <td>Status</td>
                              <td>{{$item->status}}</td>
                            </tr>
                            
                            <tr>
                              <td>Timestamp</td>
                              <td>{{$item->updated_at}}</td>
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
            <th>Keyword</th>
            <th>Price Greater</th>
            <th>Price Less</th>
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
