
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
            @if($level <4)


                <a class="btn btn-primary"  data-toggle="modal" data-target="#modal-create" ><i class="fa fa-plus" aria-hidden="true"></i> Create {{ucfirst($type)}} Category</a>
            @endif

            <div class="modal fade" id="modal-create">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Create New Category</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('admin/category/store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                <input type="hidden" name="level" value="{{$level}}" >
                                <input type="hidden" name="type" value="{{$type}}" >
                                <input type="hidden" name="parent_id" value="{{$parent_id}}">

                                <div class="form-group ">
                                    <label for="name" class="col-md-2 control-label">Title</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="title" type="text" id="name">

                                    </div>
                                </div>

                                <!--<div class="form-group ">
                                    <label for="name" class="col-md-2 control-label">Url</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="url" type="text" id="name">

                                    </div>
                                </div>-->
                                <div class="form-group ">
                                    <label for="email" class="col-md-2 control-label">Image</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="image" type="file" id="image">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-md-2 control-label">Status</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status">
                                            <option>Select an option</option>
                                            <option value="active"  >Active</option>
                                            <option value="deactive"  >Deactive</option>
                                        </select>
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

        <h4>Level {{$level}} Category</h4>



        <table class="table table-striped table-hover" id="example">
            <thead>
            <tr>
                @if($level== 1)
                    <th>Image</th>
                @endif
                <th>Name</th>
                <th>Url</th>
                <th>Status</th>
                <th>Timestamp</th>
                <th  class="action-td" >Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $item)
                <tr>

                    @if($level== 1)
                        <td><img src="{{asset($item->image)}}" height="42" width="42"></td>
                    @endif
                    <td>{{$item->title}}</td>
                    <td>{{url($item->url)}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created_at}}</td>
                    <td id="action" class="action-td">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modal-edit{{$item->id}}" title="Edit Product Category"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        @if($level <3)
                            <a class="btn btn-success" href="{{url('admin/category/'.$type.'/l'.($level+1).'/'.$item->id)}}" title="View sub Categories Product Category"><i class="fa fa-list" aria-hidden="true"></i> View Sub</a>
                        @endif
                        <a class="btn btn-danger" title="Delete Review" onclick="return confirm('Confirm delete?')" href="{{url('admin/category_entry/delete/'.$item->id)}}">Delete

                        </a>

                        <!--Edit Modal -->
                        <div class="modal fade" id="modal-edit{{$item->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Update Product Category</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel">
                                            <form method="POST" class="form-horizontal modal-update-form" action="{{ url('admin/category/update') }}"  accept-charset="UTF-8" enctype="multipart/form-data" >

                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <div class="form-group">
                                                    <label for="name" class="col-md-4 control-label">Name</label>
                                                    <div class="col-md-6">
                                                        <input class="form-control" name="title" type="text" value="{{$item->title}}"  id="edit-name">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="parent_id" value="{{$parent_id}}">
                                                <div class="form-group">
                                                    <label for="name" class="col-md-4 control-label">Url</label>
                                                    <div class="col-md-6">
                                                        <input class="form-control" name="url" type="text" value="{{$item->url}}"  id="edit-description">
                                                    </div>
                                                </div>

                                                    <div class="form-group">
                                                        <label for="email" class="col-md-4 control-label">Image</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="image" type="file" id="edit-image">
                                                        </div>
                                                    </div>

                                                <div class="form-group">
                                                    <label for="phone" class="col-md-4 control-label">Status</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="status">
                                                            <option>Select an option</option>
                                                            <option value="active" {{$item->status=='active'?'selected':''}} >Active</option>
                                                            <option value="deactive" {{$item->status=='deactive'?'selected':''}} >Deactive</option>
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

                    </td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                @if($level== 1)
                    <th>Image</th>
                @endif
                <th>Name</th>
                <th>Url</th>
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
