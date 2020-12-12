
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
      <div id="service-categories">

          <form action="{{url('admin/feed-insert')}}" method="POST" class="form-horizontal"  enctype="multipart/form-data">

        {{csrf_field()}}


        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-zone">Merchant</label>
          <div class="col-sm-10">
            <select name="merchant_id" id="input-zone" class="form-control selectpicker" id="select-country" data-live-search="true">
              <option value=""> --- Please Select a Merchant --- </option>
              <?php foreach ($merchants as $key => $merchant): ?>
                <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-zone">Upload Mode</label>
          <div class="col-sm-6">
            <select name="mode" class="form-control" id="package_id">
              <option>Select Uploading Mode</option>
              <option value="insert">New Insert</option>
              <option value="replace">Update</option>
            </select>
          </div>
        </div>

        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-zone">XML File</label>
          <div class="col-sm-6">
            <input type="file" class="form-control" name="feed">
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
