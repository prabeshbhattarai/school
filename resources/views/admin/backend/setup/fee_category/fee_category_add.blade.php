@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Setup Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Fee Category</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
	<div class="card">
<div class="card-body">
	<h4 class="card-title">Add Fee Category</h4>
	<br>
	<br>
	
	
	<form method="post" action="{{route('admin.store.fee.category')}}">	
		@csrf								
                                
    
        	<div class="col-md-6">
				<div class="mb-3">
					<label for="name" class="form-label">Fee Category Name</label>
					<input  class="form-control" name="name" type="text">
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