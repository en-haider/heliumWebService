<?php 
use App\support_status;
use App\support_type;
use App\companies;
?>

@extends('layouts.master')


@section('main_page')
users
@endsection

@section('active_page')
Create New Members
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
				
                {{Form::open(array('route' => 'users.store', 'method' => 'post', 'class' => 'form-horizontal','data-parsley-validate'=>''))}}
					
				

				



							<div class="form-group">
							
                         
									<div class="text-center">
										<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
										<h5 class="content-group">Create new account <small class="display-block">All fields are required</small></h5>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
										<div class="form-control-feedback">
											<i class="icon-user-check text-muted"></i>
										</div>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                       @endif
									</div>

                                    

                                    	<div class="form-group has-feedback has-feedback-left">
                                           
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                 @endif
									    </div>



									<div class="form-group has-feedback has-feedback-left">
										
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
										<div class="form-control-feedback">
											<i class="icon-user-lock text-muted"></i>
										</div>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                       @endif

									</div>


                                    	<div class="form-group has-feedback has-feedback-left">
										
                                        <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
										<div class="form-control-feedback">
											<i class="icon-user-lock text-muted"></i>
										</div>

                                      

									</div>

									
									<div class="form-group">
									<div class="col-lg-4">
								<select class="form-control" name="user_type" required>
                               
								<option class="form-control" value="" selected>Select User Type</option>	
		
                      
											<option value="admin">
												Admin
											</option>

											<option value="user">
												User
											</option>
                                
                                         
								
								</select>
							</div>
									</div>

									<button type="submit" class="btn bg-indigo-400 btn-block">
                                    {{ __('Register') }}
                                     <i class="icon-circle-right2 position-right"></i></button>
                    {!! Form::close() !!}


	

		  @include('layouts.layout.errors')

		</div><!-- /form horizontal -->
		<!-- Footer -->

	</div>
	<div class="footer text-muted">
			&copy; 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div><!-- /footer -->
	
	<!-- /content area -->
	<!-- /main content -->
	<!-- /page content -->
	<!-- /page container -->
	@endsection

	
	@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	@endsection
	
	