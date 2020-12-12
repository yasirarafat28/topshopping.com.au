
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

          <form method="POST" action="{{ url('admin/product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

            {!! csrf_field() !!}

            <div class="container-fluid">
              <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="home" aria-expanded="true" aria-selected="true">Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="home" aria-selected="true">Meta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="home" aria-selected="true">Image</a>
                </li>
              </ul>




              <!-- Tabs Content -->
              <div class="tab-content" id="nav-tabContent">

                  <!--Information-->

                  <div class="tab-pane fade active in col-md-12" id="nav-1" role="tabpanel">

                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Title</label>
                          <div class="col-md-8">
                              <input class="form-control" name="title" type="text" id="title">
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="email" class="col-md-2 control-label">Category</label>
                          <div class="col-md-8">
                              <select name="category_id" id="" class="form-control selectpicker"   data-live-search="true"">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $key => $category): ?>
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                <?php endforeach ?>
                              </select>
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="email" class="col-md-2 control-label">Merchant</label>
                          <div class="col-md-8">
                              <select name="merchant_id" id="" class="form-control selectpicker"   data-live-search="true"">
                                <option value="">Select Category</option>
                                <?php foreach ($merhants as $key => $item): ?>
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                <?php endforeach ?>
                              </select>
                              
                          </div>
                      </div>

                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Description</label>
                          <div class="col-md-8">
                            <textarea  name="description" type="text" class="summernote"></textarea>
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Overview</label>
                          <div class="col-md-8">
                            <textarea  name="overview" type="text" class="summernote"></textarea>
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">SKU</label>
                          <div class="col-md-8">
                              <input class="form-control" name="sku" type="text" id="title">
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Model</label>
                          <div class="col-md-8">
                              <input class="form-control" name="model" type="text" id="title">
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Stock Quantity</label>
                          <div class="col-md-8">
                              <input class="form-control" name="quantity" type="number" id="title">
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Price</label>
                          <div class="col-md-8">
                              <input class="form-control" name="price" type="number" id="title" step="any">
                              
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="name" class="col-md-2 control-label">Discount</label>
                          <div class="col-md-8">
                              <input class="form-control" name="discount" type="number" id="title" step="any">
                              
                          </div>
                      </div>                      
                      <div class="form-group">
                          <label for="phone" class="col-md-2 control-label">Status</label>
                          <div class="col-md-8">
                            <select class="form-control" name="status">
                              <option>Select an option</option>
                              <option value="active"  >Active</option>
                              <option value="pending"  >Pending</option>
                            </select>
                          </div>
                      </div>


                      <div class="clearfix"></div>
                      
                  </div>

                  <!--Meta</!-->
                  <div class="tab-pane fade col-md-12" id="nav-2" role="tabpanel">
                      <div class="form-group ">
                        <label for="name" class="col-md-2 control-label">Meta Title</label>
                        <div class="col-md-8">
                            <input class="form-control" name="meta_title" type="text" id="title">
                            
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-2 control-label">Meta Description</label>
                        <div class="col-md-8">
                          <textarea  name="meta_description" type="text" class="summernote"></textarea>
                            
                        </div>
                    </div>


                      <div class="clearfix"></div>
                      
                  </div>
                  <!--Image</!-->
                  <div class="tab-pane fade col-md-12" id="nav-3" role="tabpanel" aria-labelledby="nav-services-tab">
                      <div class="col-sm-6" style="float: left;">
                        <label class="control-label" for="input-confirm">Image</label>
                        <input class="form-control" name="image" type="file" id="image" onchange="readImage('logo',this)" >
                        <img style="margin-top: 10px;" id="logo-preview" src="http://placehold.it/180" alt="your image" />
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
