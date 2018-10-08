<?php 

use App\gov;

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
				<h5 class="panel-title">{{$pccode->pc_activename}}</h5>
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

            @foreach($pccode->loginmap as $loginmap)
            <p>{{$loginmap->l_server}}</p>
            
            @endforeach
				
            	
            
                      

	

		 

		</div>
	
		<div class="footer text-muted">
			&copy; 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div>
	</div>

	@endsection

	
	@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	@endsection
	
	