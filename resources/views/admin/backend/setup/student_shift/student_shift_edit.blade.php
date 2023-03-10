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
	<h4 class="card-title">Edit Student Shift</h4>
	<br>
	<br>
	
	
	<form method="post" action="{{route('admin.update.shift', $editData->id)}}">	
		@csrf								
                                
    
        	<div class="col-md-6">
				<div class="mb-3">
					<label for="name" class="form-label">Student Shift Name</label>
					<input  class="form-control" name="name" type="text" value="{{$editData->name}}">
					@error('name')
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