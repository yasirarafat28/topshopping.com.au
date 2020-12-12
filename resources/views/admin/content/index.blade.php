
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

      <div class="row">
        <form action="{{url('admin/content/store')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data">

          {{csrf_field()}}

          <input type="hidden" name="type" value="{{$type}}">



          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-address-1">Title</label>
            <div class="col-sm-8">
              <input type="text" name="title" value="{{isset($content->title) ? $content->title : ''}}" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-company">Description</label>
            <div class="col-sm-8">
              <textarea name="description"  class="summernote">{{isset($content->description) ? $content->description : ''}}</textarea>
            </div>
          </div>
          <div class="form-group">
              <div class="col-md-offset-4 col-md-5">
                  <input id="update" class="btn btn-primary" type="submit" value="Submit">
              </div>
          </div>


        </form>
      </div>

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.container-fluid -->

  <!--  Footer -->

  @include('admin/inc/footer')
