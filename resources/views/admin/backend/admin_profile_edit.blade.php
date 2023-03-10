@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
<div class="card">
<div class="card-body">
	<h4 class="card-title">Update  User</h4>
	<br>
	<br>
	
    <form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">	
		@csrf	
	
	


		<div class="row"> 
        		<div class="col-md-6">
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input id="name" value="{{ $editData->name }}" class="form-control" name="name" type="text" >
			</div>
        	
            
		</div>  
        
        

    	<div class="col-md-6">
        <div class="mb-3">
				<label for="name" class="form-label">User Email</label>
				<input id="email" value="{{ $editData->email }}" class="form-control" name="email" type="email">
			</div>
        	


        </div>
        
    	</div> <!--end of row -->

        <div class="row"> 
        		<div class="col-md-6">
			<div class="mb-3">
				<label for="name" class="form-label">User Mobile</label>
				<input id="phone" value="{{ $editData->phone }}" class="form-control" name="phone" type="text">
			</div>
        	
            
		</div>  
        
        

    	<div class="col-md-6">
        <div class="mb-3">
				<label for="name" class="form-label">User Address</label>
				<input id="address" value="{{ $editData->address }}" class="form-control" name="address" type="text">
			</div>
        	


        </div>
        
    	</div> <!--end of row -->
        							
                                
    	<div class="row"> 
        <div class="col-md-6">
        <div class="mb-3">
		<label for="ageSelect" class="form-label">Select Gender</label>
            <select class="form-select" name="gender" id="gender">
										
                <option selected="" disabled="">Select Role </option>
			    <option value="Male" {{($editData->gender == "Male" ? "selected": "")}} >Male</option>
			    <option value="Female" {{($editData->gender == "Female" ? "selected": "")}} >Female</option>
				
			</select>
		</div>  
        
        </div>

        <div class="col-md-6">
        <div class="mb-3">
		<label for="name" class="form-label">User Profile Image</label>
		<input id="photo" class="form-control" name="photo"  type="file">
		</div>

        <div class="mb-3">
		
		<img id="showImage" src="{{(!empty($adminData->photo)) ? 
            url('upload/admin_images/'.$adminData->photo):url('upload/avatar-3.png ')}} " style="width:100px; border: 1px solid #000000;">
        
		</div>


        </div>
        
    	</div> <!--end of row -->
                            
                        
		<input class="btn btn-primary" type="submit" value="Update">
	</form>
	 </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#photo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection