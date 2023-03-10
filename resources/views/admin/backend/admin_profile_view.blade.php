@extends('admin.admin_dashboard') 
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-wrapper">
			<div class="page-content"> 
				<!--breadcrumb-->
				<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Manage Profile</a></li>
				<li class="breadcrumb-item active" aria-current="page">Your Profile</li>
			</ol>
		</nav>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
                                           
											<img src="{{(!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/avatar-3.png ')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
                                            
												<h4>Name: {{$adminData->name}}</h4>
												<p class="text-secondary mb-1"> Email: {{$adminData->email}}</p>
												<p class="text-muted font-size-sm">Address: {{$adminData->address}}</p>
                                                <p class="text-muted font-size-sm">Mobile No: {{$adminData->phone}}</p>
                                                <p class="text-muted font-size-sm">Gender: {{$adminData->gender}}</p>
                                                

                                                <br>

                                                <a href=" {{route('admin.profile.edit')}}   "   class="btn btn-primary mb-5">Edit Profile</a>
												
											</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://codervent.com</span>
											</li>
											
											
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>
										</ul>
									</div>
								</div>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</div>


        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
            </script>

@endsection