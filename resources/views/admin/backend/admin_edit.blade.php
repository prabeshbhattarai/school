@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
<div class="card">
<div class="card-body">
	<h4 class="card-title">Update  User</h4>
	<br>
	<br>
	
	
	<form method="post" action="{{route('admin.update', $editData->id)}}">	
		@csrf								
                                
    	<div class="row"> 
        <div class="col-md-6">
        <div class="mb-3">
		<label for="ageSelect" class="form-label">User Role</label>
            <select class="form-select" name="usertype" id="Userselect">
										
                <option selected="" disabled="">Select Role </option>
			    <option value="Admin" {{($editData->usertype == "Admin" ? "selected": "")}} >Admin</option>
			    <option value="Student" {{($editData->usertype == "Student" ? "selected": "")}} >Student</option>
				<option value="Teacher" {{($editData->usertype == "Teacher" ? "selected": "")}} >Teacher</option>
				<option value="Parent" {{($editData->usertype == "Parent" ? "selected": "")}} >Parent</option>
				<option value="Accountant" {{($editData->usertype == "Accountant" ? "selected": "")}} >Accountant</option>
			</select>
		</div>  
        
        </div>

        <div class="col-md-6">
        <div class="mb-3">
		<label for="name" class="form-label">User Name</label>
		<input id="username" class="form-control" name="name" value="{{ $editData->name }}" type="text">
		</div>


        </div>
        
    	</div> <!--end of row -->


		<div class="row"> 
        		<div class="col-md-6">
			<div class="mb-3">
				<label for="name" class="form-label">User Email</label>
				<input id="email" value="{{ $editData->email }}" class="form-control" name="email" type="email">
			</div>
        	
            
		</div>  
        
        

    	<div class="col-md-6">
        	


        </div>
        
    	</div> <!--end of row -->
                                
                            
                                
    
                  
    
                 
                  
									
   
            
   
		<input class="btn btn-primary" type="submit" value="Update">
	</form>
	 </div>

</div>

@endsection