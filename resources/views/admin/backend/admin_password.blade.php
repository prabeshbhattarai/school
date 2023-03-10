@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Manage User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add User</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
	<div class="card">
<div class="card-body">
	<h4 class="card-title">Change Password</h4>
	<br>
	<br>
	
	
	<form method="post" action="{{route('admin.password.update')}}">	
		@csrf								
                                
    
        	<div class="col-md-6">
				<div class="mb-3">
					<label for="name" class="form-label">Current Password</label>
					<input id="current_password" class="form-control" name="oldpassword" type="password">
					@error('oldpassword')
						<span class="text-danger">{{$message}}</span>
					@enderror
				</div>
        	</div>
            
		
    	<div class="col-md-6">
        	<div class="mb-3">
				<label for="name" class="form-label">New Password</label>
				<input id="password" class="form-control" name="password" type="password">
				@error('password')
					<span class="text-danger">{{$message}}</span>
				@enderror
			</div>
		</div> 


		<div class="col-md-6">
        	<div class="mb-3">
				<label for="name" class="form-label">Confirm Password</label>
				<input id="password_confirmation" class="form-control" name="password_confirmation" type="password">
				@error('password_confirmation')
					<span class="text-danger">{{$message}}</span>
				@enderror
			</div>
		</div> 


		
                                
                            
                                
    
                  
    
                 
                  
									
   
            
   
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
	 

</div>
</div>
</div>
</div>

@endsection