<?php 
use App\support_status;
use App\support_type;
use App\companies;
?>

@extends('layouts.master')


@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection


	 @section('content') <!-- Content area -->
	<div class="content">
		<!-- Form horizontal -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Basic form inputs</h5>
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
					{!! Form::model($support,['route'=>['support.update',$support->id],'method'=>'PATCH','class' => 'form-horizontal','data-parsley-validate'=>' '])!!}
					{{csrf_field()}}
					<fieldset class="content-group">
						<legend class="text-bold">Basic inputs</legend>


				

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
                               
								<option value="{{$support->companies_id}}" selected>
								<?php echo $com_name =($com_name=companies::find($support->companies_id) ) ?  $com_name->co_name : null;	?>
								</option>	
		
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
								<select class="form-control" name="support_type_id">
								<option value="{{$support->support_type_id}}" selected>
								<?php echo $sup_type =($sup_type=support_type::find($support->support_type_id) ) ?  $sup_type->sup_type : null;	?>
								</option>	
									@foreach(support_type::all() as $sup_tp)
										@if($sup_tp->id != $support->support_type_id)								
											<option value="{{$sup_tp->id}}">
												{{ $sup_tp->sup_type}}
											</option>
										@endif
									@endforeach
								
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-2">Support Status</label>
							<div class="col-lg-10">
								<select class="form-control" name="support_status_id">

 								<option value="{{$support->support_status_id}}" selected>  
									 <?php  echo  $sup_status =($sup_status=support_status::find($support->support_status_id) ) ? $sup_status->sup_status : null;     ?>
								</option>
							
									@foreach(support_status::all() as $sup_status)
										@if($sup_status->id != $support->support_status_id)								
											<option value="{{$sup_status->id}}">
												{{ $sup_status->sup_status}}
											</option>
										@endif
									@endforeach

						
								
								</select>
							</div>
						</div>
						<div class="text-right">
							<button class="btn btn-primary legitRipple" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</fieldset>
				{!!Form::close()!!}


	

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
	
	