<?php 

use App\gov;
use App\loginmap;
use App\Support;
use App\support_type;
use App\support_status;
use App\User;
use App\companyfeedback;
use App\companies;
use App\feedback_types;
use App\pccode;

?>

@extends('layouts.master')

@section('main_page')
company
@endsection

@section('active_page')
{{$company->co_name}}
@endsection

@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection

	 @section('content') <!-- Content area -->
	<div class="content">
		<!-- Form horizontal -->



<div class="row">
		<div class="col-md-3 col-xs-12">
		


			<div class="sidebar-detached">
			        	<div class="sidebar sidebar-default">
							<div class="sidebar-content">

				        		<!-- Support -->
								<div class="sidebar-category no-margin">
									<div class="category-title">
										<span style="font-weight:bold">{{$company->co_name}}</span>
										<div class="" style="float:right;position:relative;left:35px;bottom:15px;" >
										{!!Html::linkRoute('company.edit',' ',array($company->id),array('class'=>'glyphicon glyphicon-edit pull-right'))!!}   
									   </div>		
									</div>

									<div class="category-content">
										{!!Html::linkRoute('support.create',' Company support ',array('id'=>$company->id),array('class'=>'btn bg-danger-400 btn-block icon-lifebuoy position-left' ))!!}
									</div>

									<ul class="nav navigation">
									<li><a href="#v_1_6">PC Number <span class="text-muted text-regular pull-right" style="color:red">{{$company->pccode->count()}} </span></a></li>
								
									<li><a href="#v_1_6">Version <span class="text-muted text-regular pull-right" style="color:red"> {{$company->LastLogin()->l_version}}</span></a></li>
									<li><a href="#v_1_6">Last Login <span class="text-muted text-regular pull-right" style="color:red"> {{$company->LastLogin()->l_date}}</span></a></li>
								
									</ul>
								
									
									
								</div>
								<!-- /support -->

			        			
			        			<!-- Navigation -->
								<div class="sidebar-category">
									<div class="category-content no-padding">
										<ul class="nav navigation">
											<li class="navigation-divider no-margin-top"></li>
											<li class="navigation-header"><i class="icon-history pull-right"></i>Company Information</li>
											<li><a href="#v_1_6">Name <span class="text-muted text-regular pull-right">{{$company->co_name}}</span></a></li>
											<li><a href="#v_1_5">Alies <span class="text-muted text-regular pull-right">{{$company->co_alies}}</span></a></li>
											<li><a href="#v_1_4">City <span class="text-muted text-regular pull-right"><?php echo $com_city =($com_city=gov::find($company->cofk_gov) ) ? $com_city->gov_nameAr  : null;   	?></span></a></li>
											<li><a href="#v_1_3">Address <span class="text-muted text-regular pull-right">{{$company->co_address}}</span></a></li>
											<li><a href="#v_1_3">SQL version <span class="text-muted text-regular pull-right">{{$company->co_sqlserver_version}}</span></a></li>
											
											<li><a href="#v_1_1">Active date <span class="text-muted text-regular pull-right">{{$company->co_active_date}}</span></a></li>
											
											
											<li class="navigation-divider"></li>
											<li class="navigation-header"><i class="icon-gear pull-right"></i> Extras</li>
											<li><a href="http://themeforest.net/user/kopyov" target="_blank"><i class="icon-bubbles4 text-slate-400"></i> Contact me</a></li>
											<li><a href="http://kopyov.ticksy.com/" target="_blank"><i class="icon-lifebuoy text-slate-400"></i> Support</a></li>
											<li><a href="http://themeforest.net/user/kopyov/portfolio?ref=Kopyov" target="_blank"><i class="icon-rocket text-slate-400"></i> Other templates</a></li>
							            </ul>
						            </div>
					            </div>
					            <!-- /navigation -->

				            </div>
			            </div>
		            </div>
					</div>

					<div class="col-sm-9 col-md-9 col-xs-12">
					<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">All PC OF THIS COMPANY</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

 
    <table class="table datatable-basic">
        <thead>
            <tr>

               
                
                <!--<th>Support Name</th>-->
                <th>Active Name</th>           
                <th>User Name</th>
                <th>Version</th>
                <th>Login Date</th>
                <th>Block</th>              
                <th class="text-center">Actions</th>
            </tr>
        </thead>

		  <tbody>

		  @foreach($company->pccode as $pccodes)
		  <tr>
				
            <th>{{$pccodes->pc_activename}}</th>
			<?php  $user =loginmap::where('pccodes_id', $pccodes->id)->get()->last();?>
			<th>@isset($user->l_username) {{$user->l_username}} @endisset</th>
			<th>@isset($user->l_version) {{$user->l_version}}@endisset  </th>
			<th>@isset($user->l_version)  {{$company->get_DateLastLogin($user->created_at) }}  @endisset </th>
			<th></th>
			<th></th>
			</tr>

			 @endforeach
			</tbody>
			</tbody>
    </table>

	</div>








	<!--Support Table of This Company-->
	<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">All Support Of This Company</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

 
    <table class="table datatable-basic">
        <thead>
            <tr>

               
                
                <!--<th>Support Name</th>-->
                <th>Support Name</th>           
                <th>Support Details</th>
                <th>Support Type</th>
                <th>Support Status</th>
                <th>Support Date</th>              
                <th class="text-center">Actions</th>
            </tr>
        </thead>

		  <tbody>
		  <?php $supports=Support::where('companies_id',$company->id)->get();   	?>
		  @foreach($supports as $support)
		  <tr>
		
            <th><?php echo  $sup_name=($sup_name=User::find($support->users_id))? $sup_name->name :null;?></th>	
			<th>{{$support->sup_details}}</th>
			<th><?php $sup_type=support_type::findOrFail($support->support_type_id);?> {{$sup_type->sup_type}}</th>
			<th><?php $sup_status=support_status::findOrFail($support->support_status_id);?> {{$sup_status->sup_status}}</th>
			<th>{{$support->created_at}}</th>
			<th></th>
			</tr>

			 @endforeach
			</tbody>
			</tbody>
    </table>

	</div>

	<!--End of Support Table-->





<div class="row">
	<div class="col-md-12">
		<!--Feedback Table of This Company-->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">All Feedback Of This Company</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
		
			
			
		
			
			<table class="table datatable-basic">
				<thead>
					<tr>
		
					   
						
					   
						<th>PC Active Name</th>       
						<th>User Name</th>
						<th>Pc Name</th>
						<th>Helium Version</th>    
						<th>Feedback Type</th>  
						<th>Feedback Details</th>   
						<th>Feedback Date</th>             
						<th class="text-center">Actions</th>
					</tr>
				</thead>
		
				  <tbody>
				 
				  
				  @foreach($company->CompanyFeedback() as $feedback) 
				  <tr>

				  

				 
				  <td>
				  @isset(pccode::find($feedback->fbfk_pccode)->pc_activename)
				  {{pccode::find($feedback->fbfk_pccode)->pc_activename}}
				  @endisset
				  </td> 


				   <td>{{$feedback->fb_username}}</td> 

				   <td></td>
				   
				  <td>{{$feedback->fb_version}}</td> 
				  <td>{{feedback_types::find($feedback->feedback_types_id)->tfb_name}}</td> 
				  <td>{{$feedback->fb_content}}</td> 
				  <td>{{$feedback->fb_date}}</td> 
				  <td></td>
	   
				  </tr>

				  @endforeach
		
				
					</tbody>
					</tbody>
			</table>
		
			</div>
		</div>
	</div>
			<!--End of Feedback Table-->



	
	</div>
</div>



	
		<div class="footer text-muted">
			&copy; 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div>
	</div>

	@endsection

	
	@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	@endsection
	
	