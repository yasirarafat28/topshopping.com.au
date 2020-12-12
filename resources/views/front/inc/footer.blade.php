<!--Footer Start-->
<footer id="footer">
    <div class="fpart-first">
        <div class="container">
            <div class="row">
                <div class="contact col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <h5>About AusPrice.Com</h5>
                    <p>AusPrice is the top price comparison based shopping guide in Australia. It has been working to reach you to the thousands of online shops that can help you to find out the best price from all of the high profile competitors for fashion,electronice, apparel and others.</p>
                    <img src="{{asset('images/logo.png')}}" class="col-md-12">
                </div>
                <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="{{url('information/about')}}">About Us</a></li>
                        <li><a href="{{url('information/contact')}}">Contact Us</a></li>
                        <li><a href="{{url('information/term')}}">Terms & Condition</a></li>
                        <li><a href="{{url('information/privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('information/faq')}}">FAQ</a></li>
                    </ul>
                </div>
                <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <h5>Merchant Area</h5>
                    <ul>
                        <li><a href="{{url('merchant/account')}}">My Account</a></li>
                        <li><a href="{{url('merchant/login')}}">Login</a></li>
                        <li><a href="{{url('merchant/register')}}">Register</a></li>
                        <li><a href="{{url('merchant/products')}}">Products</a></li>
                    </ul>
                </div>
                <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <h5>Stay Connected</h5>
                    <p>Deals, Steals, and Style Ideas delivered to your inbox regularly.
                    </p>
                    <form action="{{route('newsletterSubmit')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input class="input form-control" placeholder="Enter Email Address" name="email">
                        </div>
                        <button class="btn primary-btn">Join Newslatter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="fpart-second">
        <div class="container">
            <div id="powered" class="clearfix">
                <div class="powered_text pull-left flip">
                    <p><a href="{{url('')}}">AusPrice</a> © {{date("Y")}} | Design and Developed By <a href="#">SoftNTechnology</a></p>
                </div>
            </div>
        </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
</footer>
<!--Footer End-->


<!-- JS Part Start-->
<script type="text/javascript" src="{{asset('frontNew/js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontNew/js/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontNew/js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontNew/js/jquery.dcjqaccordion.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontNew/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontNew/js/custom.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140027203-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-140027203-1');
</script>


<script>
    function ProductRedirect(product_id)
    {
        $.ajax({
            type: "POST",
            url: "{{ route('ProductRedirect') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "product_id": product_id,
                "ip": "{{$_SERVER["REMOTE_ADDR"]}}",
            },
            success: function (data) {
                //location.reload();
                //window.location.href = data;
                window.open(data, '_blank');

            },

            error: function (error) {
                console.log(error);
            },
        })
    }
</script>
<!-- JS Part End-->
<script type="text/javascript">
    
    $(window).on('load', function() {

        GetCategoryImage();

    });


    function GetCategoryImage()
    {
        $.ajax({
            type: "POST",
            url: "{{ route('GetCategoryImage') }}",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                jQuery.each(data, function(index, item) {
                  $('#nav-category-id-'+item.id).attr('src', '/'+item.image);
              });

            },

            error: function (error) {
                console.log(error);
            },
        })
    }
</script>

</body>
</html>
