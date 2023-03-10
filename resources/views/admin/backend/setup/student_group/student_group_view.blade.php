@extends('admin.admin_dashboard')
@section('admin')

<div class="main-wrapper">

		
	<div class="page-content">

		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Tables</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Table</li>
			</ol>
		</nav>

			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Student Group List</h6>
                            <a href="{{route('admin.group.add')}}" style="float: right;"  class="btn btn-rounded btn btn-primary me-2">Add Student Group </a>
               
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
                                            @foreach($allData as $key => $group)
                                            <tr>
                                                <td>{{ $key+1 }}</td>    
                                                <td>{{ $group->name }}</td>
                                                <td>
                                                    <a href=" {{route('admin.group.edit', $group->id)}}" class="btn btn-primary me-2">Edit</a>
                                                    <a href=" {{route('admin.group.delete', $group->id)}} " class="btn  btn-secondary" id="delete">Delete</a>
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