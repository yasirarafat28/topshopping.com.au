
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
      <section id="service-categories">

          <form method="POST" action="{{ url('admin/merchant') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

            {!! csrf_field() !!}

            <div class="container-fluid">
              <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="home" aria-expanded="true" aria-selected="true">Company Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="home" aria-selected="true">Personal Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="home" aria-selected="true">Image</a>
                </li>
              </ul>




              <!-- Tabs Content -->
              <div class="tab-content" id="nav-tabContent">

                  <!--Company-->

                  <div class="tab-pane fade active in col-md-12" id="nav-1" role="tabpanel">

                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-company">Company Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="company_name" value="{{$merchant->name}}" placeholder="Company Name" id="input-company" class="form-control">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-1">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="address_address" value="{{$merchant->address}}" placeholder="Address" id="input-address" class="form-control">
                        </div>
                      </div>

                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-zone">City</label>
                        <div class="col-sm-10">
                          <select name="city_id" id="input-zone" class="form-control">
                            <option value=""> --- Please Select City --- </option>
                            <?php foreach ($cities as $key => $city): ?>
                            <option  {{$merchant->city==$city->id? 'selected': ''}}  value="{{$city->id}}">{{$city->name}}</option>
                          <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-zone">Location</label>
                        <div class="col-sm-10">
                          <select name="location_id" id="input-zone" class="form-control">
                            <option value=""> --- Please Select Location --- </option>
                            <?php foreach ($locations as $key => $location): ?>
                            <option {{$merchant->location==$location->id? 'selected': ''}} value="{{$location->id}}">{{$location->name}}</option>
                              
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                        <div class="col-sm-10">
                          <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control">
                        </div>
                      </div>


                      <div class="clearfix"></div>
                      
                  </div>

                  <!--Person</!-->
                  <div class="tab-pane fade col-md-12" id="nav-2" role="tabpanel">
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Contact Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{$merchant->user->name}}" placeholder="Name" id="input-firstname" class="form-control">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{$merchant->user->email}}" placeholder="E-Mail" id="input-email" class="form-control">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Phone</label>
                        <div class="col-sm-10">
                          <input type="tel" name="phone" value="{{$merchant->user->phone}}" placeholder="Phone" id="input-telephone" class="form-control">
                        </div>
                      </div>


                      <div class="clearfix"></div>
                      
                  </div>
                  <!--Image</!-->
                  <div class="tab-pane fade col-md-12" id="nav-3" role="tabpanel" aria-labelledby="nav-services-tab">
                      <div class="col-sm-4" style="float: left;">
                        <label class="control-label" for="input-confirm">Company Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" onchange="readImage('logo',this)" >
                        <img id="logo-preview" src="http://placehold.it/180" alt="your image" />
                      </div>

                      <div class="col-sm-4" style="float: left;">
                        <label class="control-label" for="input-confirm">NID Front</label>
                        <input type="file" name="nid_front" class="form-control" id="nid-front" onchange="readImage('nid_front',this)" >
                        <img id="nid-front-preview" src="http://placehold.it/180" alt="NID Front" />
                      </div>
                      <div class="col-sm-4" style="float: left;">
                        <label class="control-label" for="input-confirm">NID Back</label>
                        <input type="file" name="nid_back" class="form-control" id="nid-back"  onchange="readImage('nid_back',this)" >
                        <img id="nid-back-preview" src="http://placehold.it/180" alt="NID Back" />
                      </div>


                      <div class="clearfix"></div>
                      
                  </div>
                  <div class="form-group">
                      <div class="col-md-offset-4 col-md-4">
                          <input id="update" class="btn btn-primary btnper" type="submit" value="Create">
                      </div>
                  </div>
              </div>
          </div>
        </form>
    </section>


                  
                  
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.container-fluid -->

  <!--  Footer -->

  <style>
    .tab-pane{
      padding-top:20px;
    }
  </style>


  @include('admin/inc/footer')
