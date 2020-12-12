
@include('front/inc/header')
<!-- BREADCRUMB -->
<div id="breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Merchant Registration</li>
    </ul>
  </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div id="content" class="col-sm-9 "  style="padding: 1em 5em;border: 1px solid #ddd;">
        <div class="row">

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


      <aside id="column-right" class="col-sm-3 hidden-xs">

        @include('front/inc/merchant-sidebar')
      </aside>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->

@include('front/inc/footer')