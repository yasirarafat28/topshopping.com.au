<div class="list-group">
	@if(Auth::user())
		<a href="{{url('merchant/account')}}" class="list-group-item">My Account</a>
		<a href="{{url('merchant/edit-information')}}" class="list-group-item">Edit Information</a>
		<a href="{{url('merchant/products')}}" class="list-group-item">Products</a>
		<a href="{{url('logout')}}" class="list-group-item">Logout</a> 

	@else
		<a href="{{url('merchant/login')}}" class="list-group-item">Login</a> 
		<a href="{{url('merchant/register')}}" class="list-group-item">Register</a> 
		<a href="{{url('password/reset')}}" class="list-group-item">Forgotten Password</a>
	@endif
</div>