<div class="dropdown-menu dropdown-menu-right ">
	@if (Auth::user())
		<a href="{{ route('logout') }}" class="dropdown-item"> 
			<i class="ni ni-user-run"></i> <span>Logout</span>
		</a>
	@else
		<a class="dropdown-item" data-toggle="modal" data-target="#loginModal">
			<i class="ni ni-bold-right"></i> <span>Login</span>
		</a>
		<a class="dropdown-item" data-toggle="modal" data-target="#registerModal">
			<i class="ni ni-circle-08"></i> <span>Register</span>
		</a>
	@endif
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<form class="modal-content" method="POST" action="{{ route('auth') }}">
      		<div class="modal-header">
        		<h5 class="modal-title" id="loginModalLabel">Login</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
	            @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	            <div class="form-group">
	                <label for="login">Email or Username</label>
	                <input type="text" class="form-control" id="login" name="login" required>
	            </div>
	            <div class="form-group">
	                <label for="password">Password</label>
	                <input type="password" class="form-control" id="password" name="password" required>
	            </div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="submit" class="btn btn-primary"> Submit </button>
	      	</div>
    	</form>
  	</div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<form class="modal-content" method="POST" action="{{ route('register') }}">
      		<div class="modal-header">
        		<h5 class="modal-title" id="registerModalLabel">Register</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
	            @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	            <div class="form-group">
	                <label for="name">Full Name</label>
	                <input type="text" class="form-control" id="name" name="name" required>
	            </div>
	            <div class="form-group">
	                <label for="email">Email</label>
	                <input type="email" class="form-control" id="email" name="email" required>
	            </div>
	            <div class="form-group">
	                <label for="username">Username</label>
	                <input type="text" class="form-control" id="username" name="username" required>
	            </div>
	            <div class="form-group">
	                <label for="password">Password</label>
	                <input type="password" class="form-control" id="password" name="password" required>
	            </div>
	            <div class="form-group">
	                <label for="password_confirmation">Confirm Password</label>
	                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
	            </div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="submit" class="btn btn-primary">Register</button>
	      	</div>
    	</form>
  	</div>
</div>