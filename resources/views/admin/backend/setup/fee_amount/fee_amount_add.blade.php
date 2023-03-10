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
	    <h4 class="card-title">Add Fee Amount</h4>
	    <br>
	    <br>
	
	
	<form method="post" action="{{route('admin.store.fee.amount')}}">	
		@csrf				
        <div class="add_item">
        
        <div class="col-md-6">
            <div class="mb-3">
            <label for="ageSelect" class="form-label">Fee Category</label>
                <select class="form-select" name="fee_category_id" >
                                            
                    <option selected="" disabled="">Select Fee Category </option>
                    @foreach($fee_categories as $fee_category)
                    <option value="{{ $fee_category->id }}">{{ $fee_category->name  }}</option>
                    @endforeach
                    
                </select>
            </div>  
            
        </div>


            <div class="row">
                <div class="col-md-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                        <label for="ageSelect" class="form-label">Student Class</label>
                            <select class="form-select" name="class_id[]" >
                                                        
                                <option selected="" disabled="">Select Student Class </option>
                                @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name  }}</option>
                                @endforeach
                                
                            </select>
                        </div>  
                        
                    </div>
                    
                </div>

                

                <div class="col-md-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label"> Amount </label>
                            <input  class="form-control" name="amount[]" type="text" >
                            
                        </div>
                    </div> 
                </div>
           

                
                    <div class="col-md-2" style="padding-top: 30px">
                    <span class="btn btn-primary me-2 addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                    
                    </div>
                
            </div>
        </div>

            <input class="btn btn-primary" type="submit" value="Submit">
	</form>
        </div>
            </div>

	 

    </div>
</div>
        </div>

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add"> 
            <div class="form-row"> 

                <div class="col-md-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                        <label for="ageSelect" class="form-label">Student Class</label>
                            <select class="form-select" name="class_id[]" >
                                                        
                                <option selected="" disabled="">Select Student Class </option>
                                @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name  }}</option>
                                @endforeach
                                
                            </select>
                        </div>  
                        
                    </div>
                    
                </div>

                

                <div class="col-md-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label"> Amount </label>
                            <input  class="form-control" name="amount[]" type="text" >
                            
                        </div>
                    </div> 
                </div>
           

                
                    <div class="col-md-2" style="padding-top: 30px">
                    <span class="btn btn-primary me-2 addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-secondary removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
                    </div>
                
            </div> 

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click", ".addeventmore", function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });
    });
</script>
        

@endsection