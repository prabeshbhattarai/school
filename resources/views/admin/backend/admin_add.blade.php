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
	<h4 class="card-title">Add User</h4>
	<br>
	<br>
	
	
	<form method="post" action="{{route('admin.store')}}">	
		@csrf								
                                
    	<div class="row"> 
        <div class="col-md-6">
        <div class="mb-3">
		<label for="ageSelect" class="form-label">User Role</label>
            <select class="form-select" name="usertype" id="Userselect">
										
                <option selected="" disabled="">Select Role </option>
			    <option value="admin">admin</option>
			    <option value="student">student</option>
				<option value="teacher">teacher</option>
				<option value="parent">parent</option>
				<option value="accountant">accountant</option>
			</select>
		</div>  
        
        </div>

        <div class="col-md-6">
        <div class="mb-3">
		<label for="name" class="form-label">User Name</label>
		<input id="username" class="form-control" name="name" type="text">
		</div>


        </div>
        
    	</div> <!--end of row -->


		<div class="row"> 
        		<div class="col-md-6">
			<div class="mb-3">
				<label for="name" class="form-label">User Email</label>
				<input id="email" class="form-control" name="email" type="email">
			</div>
        	
            
		</div>  
        
        

    	<div class="col-md-6">
        	<div class="mb-3">
				<label for="name" class="form-label">User Password</label>
				<input id="password" class="form-control" name="password" type="password">
			</div>


        </div>
        
    	</div> <!--end of row -->
                                
                            
                                
    
                  
    
                 
                  
									
   
            
   
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
	 </div>

</div>
</div>
</div>
</div>

@endsection