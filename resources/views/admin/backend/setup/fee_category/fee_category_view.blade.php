@extends('admin.admin_dashboard')
@section('admin')

<div class="main-wrapper">

		
	<div class="page-content">

		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Setup Management</a></li>
				<li class="breadcrumb-item active" aria-current="page">Fee Category</li>
			</ol>
		</nav>

			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Student Fee Category List</h6>
                            <a href="{{route('admin.fee.category.add')}}" style="float: right;"  class="btn btn-rounded btn btn-primary me-2">Add Fee category </a>
               
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>                
                                                <th>Name</th>
                                                <th width="25%">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allData as $key => $fee)
                                            <tr>
                                                <td>{{ $key+1 }}</td>    
                                                <td>{{ $fee->name }}</td>
                                                <td>
                                                    <a href="{{route('admin.fee.category.edit', $fee->id)}}" class="btn btn-primary me-2"  id="edit">Edit</a>


                                                    
                                                    <a href=" {{route('admin.fee.category.delete', $fee->id)}} " class="btn btn-secondary" id="delete">Delete</a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                      
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
				</div>
			</div>

		

			
		
	</div>
</div>


@endsection