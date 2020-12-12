
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
        
        <a class="btn btn-primary" href="{{url('admin/merchant_services/create')}}" ><i class="fa fa-plus" aria-hidden="true"></i> Assign Service to Merchant</a>
      </div>



      <table class="table table-striped table-hover" id="example">
        <thead>
          <tr>
            <th>Company Name</th>
            <th>Service Name</th>
            <th>Package</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Timestamp</th>
            <th  class="action-td" >Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach($records as $item)
          <tr>
            <td>{{$item->merchant->name}}</td>
            <td>{{$item->service->name}}</td>
            <td>{{$item->package->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount}}</td>
            <td>{{$item->created_at}}</td>
            <td id="action" class="action-td">
              <a class="btn btn-primary" href="{{url('admin/merchant/'.$item->id.'/edit')}}" title="Edit merchant"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

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
                              <td>Address</td>
                              <td>{{$item->address}}</td>
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
