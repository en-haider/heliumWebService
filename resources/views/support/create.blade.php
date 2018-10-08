<?php 
use App\support_status;
use App\support_type;
use App\companies;
?>

@extends('layouts.master')


@section('main_page')
support
@endsection

@section('active_page')
create new
@endsection

@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection

	 @section('content') <!-- Content area -->
	 
	<div class="content">
		<!-- Form horizontal -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title"></h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li>
							<a data-action="collapse"></a>
						</li>
						<li>
							<a data-action="reload"></a>
						</li>
						<li>
							<a data-action="close"></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="panel-body">
				
                {{Form::open(array('route' => 'support.store', 'method' => 'post', 'class' => 'form-horizontal','data-parsley-validate'=>''))}}
					
					<fieldset class="content-group">
						<legend class="text-bold">Enter New Company Support</legend>


				

						<div class="form-group">
							
                            {{Form::label('title', 'Support Details', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
					
                                {!! Form::textarea('sup_details',null, array('class'=>'form-control','rows' => 5, 'cols' => 5,'required'=>'','maxlength'=>'255')) !!}
                   
							</div>
						</div>



						<div class="form-group">
                            {{Form::label('title', 'Company Support', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
								<select class="form-control" name="companies_id" required>
									
							     @if(isset($company_edit)) <option value="{{$company_edit->id}}" selected >{{$company_edit->co_name}}</option>  
								 @else <option value="" selected>Select Company</option>@endif
		
                                    @foreach(companies::all() as $company)	
											<option value="{{$company->id}}">
                                                {{$company->co_name}}
											</option>
                                    @endforeach
                                         
								
								</select>
							</div>
						</div>



	                    <div class="form-group">
							<label class="control-label col-lg-2">Support Type</label>
							<div class="col-lg-10">
								<select class="form-control" name="support_type_id" required>

 								<option value="" selected>Select Support Type</option>  

								
							
														
                                @foreach(support_type::all() as $support_type)	
											<option value="{{$support_type->id}}">
                                                {{$support_type->sup_type}}
											</option>
                                @endforeach
									

						
								
								</select>
							</div>
						</div>


                        	<div class="form-group">
                            {{Form::label('title', 'Support Status', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
								<select class="form-control" name="support_status_id" required>
                               
								<option value="" selected>Select Support Status</option>	
		
                                    @foreach(support_status::all() as $support_status)	
											<option value="{{$support_status->id}}">
                                                {{$support_status->sup_status}}
											</option>
                                    @endforeach
                                         
								
								</select>
							</div>
						</div>






                 

					
						<div class="text-right">
							<button class="btn btn-primary legitRipple" type="submit">Submit <i class="icon-arrow-right14 position-left"></i></button>
						</div>

					</fieldset>
                    {!! Form::close() !!}


	

		  @include('layouts.layout.errors')

		</div><!-- /form horizontal -->
		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div><!-- /footer -->
	</div><!-- /content area -->
	<!-- /main content -->
	<!-- /page content -->
	<!-- /page container -->
	@endsection

	
	@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	@endsection
	
	