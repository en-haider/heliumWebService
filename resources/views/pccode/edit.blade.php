<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\pccode;
use App\loginmap;
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
					{!! Form::model($pccode,['route'=>['pcs.update',$pccode->id],'method'=>'PATCH','class' => 'form-horizontal','data-parsley-validate'=>' '])!!}
					{{csrf_field()}}
					<fieldset class="content-group">
						<legend class="text-bold">Basic inputs</legend>


				

						<div class="form-group">
							{{Form::label('PC Active Name', 'PC Active Name', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
							{!! Form::text('pc_activename',null, array('disabled' => 'disabled','class'=>'form-control','rows' => 5, 'cols' => 5,'required'=>'','display'=>'display','maxlength'=>'255')) !!}
  
							</div>
						</div>

						<div class="form-group">
							{{Form::label('PC User Name', 'PC User Name', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">							
							<input type="text" value="{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_username')->last()}}" class="form-control" disabled>
							</div>
						</div>


									<div class="form-group">
							{{Form::label('PC  Name', 'PC  Name', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
							{!! Form::text('',null, array('disabled' => 'disabled','class'=>'form-control','rows' => 5, 'cols' => 5,'required'=>'','display'=>'display','maxlength'=>'255')) !!}
  
							</div>
						</div>


						<div class="form-group">
							{{Form::label('DB Name', 'DB Name', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
							<input type="text" value="{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_db')->last()}}" class="form-control" disabled>
							</div>
						</div>


						<div class="form-group">
							{{Form::label('Server Name', 'Server Name', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
							<input type="text" value="{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_server')->last()}}" class="form-control" disabled>
  
							</div>
						</div>

							<div class="form-group">
							{{Form::label('Helium Version', 'Last Login', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
							<input type="text" value="{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_version')->last()}}" class="form-control" disabled>
  
							</div>
						</div>



							<div class="form-group">
							{{Form::label('Last Login', 'Last Login', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
							<input type="text" value="{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_date')->last()}}" class="form-control" disabled>
  
							</div>

							<br/>
								<div class="form-group">
                            {{Form::label('title', 'Company Support', ['class' => 'control-label col-lg-2'])}}
							<div class="col-lg-10">
								<select class="form-control" name="companies_id" required>
                               
								<option value="{{$pccode->companies_id}}" selected>
								<?php echo $com_name =($com_name=companies::find($pccode->companies_id) ) ?  $com_name->co_name : null;	?>
								</option>	
		
                                    @foreach(companies::all() as $company)	
											<option value="{{$company->id}}">
                                                {{$company->co_name}}
											</option>
                                    @endforeach
                                         
								
								</select>
							</div>
						</div>


						</div>


						
						


					
						<div class="text-right">
							<button class="btn btn-primary legitRipple" type="submit">Update <i class="icon-arrow-right14 position-right"></i></button>
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
	
	