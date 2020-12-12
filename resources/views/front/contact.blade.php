
@include('front/inc/header')
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="contact-us.html">Contact Us</a></li>
      </ul>
      <!-- Breadcrumb End-->
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
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Contact Us</h1>
          <h3 class="subtitle">Our Location</h3>
          <div class="row">


          </div>
          <form class="form-horizontal"  action="{{url('inquery/submit')}}" method="POST">

              {{csrf_field()}}
            <fieldset>
              <h3 class="subtitle">Send us an Email</h3>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-name">Your Name</label>
                <div class="col-md-10 col-sm-9">
                  <input type="text" name="name" value="" id="input-name" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-email">E-Mail Address</label>
                <div class="col-md-10 col-sm-9">
                  <input type="text" name="email" value="" id="input-email" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">Enquiry</label>
                <div class="col-md-10 col-sm-9">
                  <textarea name="message" rows="10" id="input-enquiry" class="form-control"></textarea>
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input class="btn btn-primary" type="submit" value="Submit" />
              </div>
            </div>
          </form>
        </div>

        <!--Middle Part End -->
      </div>
    </div>
  </div>
@include('front/inc/footer')
