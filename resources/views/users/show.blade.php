
<?php 

use App\gov;
use App\loginmap;
use App\Support;
use Carbon\Carbon;
use App\support_type;
use App\support_status;
use App\user;
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
{{$user->co_name}}
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
										<span style="font-weight:bold">{{$user->name}}</span>
										<div class="" style="float:right;position:relative;left:35px;bottom:15px;" >
										{!!Html::linkRoute('users.edit',' ',array($user->id),array('class'=>'glyphicon glyphicon-edit pull-right'))!!}   
									   </div>		
									</div>

									<div class="category-content">
										
									</div>

									<ul class="nav navigation">
									<li><a href="#v_1_6">{{$user->name}} <span class="text-muted text-regular pull-right" style="color:red"></span></a></li>					
									<li><a href="#v_1_6">{{$user->email}} <span class="text-muted text-regular pull-right" style="color:red"> </span></a></li>
									<li><a href="#v_1_6">Last Login :{{$user->get_DateLastLogin($user->updated_at)}} <span class="text-muted text-regular pull-right" style="color:red"></span></a></li>
								
									</ul>
								
									
									
								</div>
								<!-- /support -->

			        			
			        			<!-- Navigation -->
								
					            <!-- /navigation -->

				            </div>
			            </div>
		            </div>
					</div>

					<div class="col-sm-9 col-md-9 col-xs-12">
					<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">All Support Of This User</h5>
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
						<th>Company Name</th>        
						<th>Support Details</th>
						<th>Support Type</th>
						<th>Support Status</th>
						<th>support date</th>              
						<th class="text-center">Actions</th>
					</tr>
               
            
        </thead>

		  <tbody>

		
			@foreach($user->support() as $support)
			<tr>
         
            
					<!--<td>{{$support->sup_name}}</td>-->
					<td>{{companies::find($support->companies_id)->co_name}}</td>  
					<td>....{!! substr($support->sup_details, 0, 140) !!}</td>           
					<td>{{support_type::find($support->support_type_id)->sup_type}}</td>    
					<td>  <?php 
					
						 echo $status =($status=support_status::find($support->support_status_id) ) ? '<span class="'.$status->class_name.'">' .$status->sup_status .'</span>'   : null;          
						  ?>
						  
					  </td>
		
		
					
					<td>{{$support->updated_at}}</td> 
					<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown">
															<i class="icon-menu9"></i>
														</a>
		
														<ul class="dropdown-menu dropdown-menu-right">
															<li>{!!Html::linkRoute('support.show',' show ',array($support->id),array('class'=>'icon-file-pdf'))!!} </li>
															<li>{!!Html::linkRoute('support.edit',' Edit ',array($support->id),array('class'=>'icon-file-pdf'))!!}   </i>
															<li>
														   {!!Form::open(['route'=>['support.destroy',$support->id],'method'=>'DELETE'])!!}
		
															{!!Form::submit('Delete',['class'=>'center icon-file-pdf btn btn-default  '])!!}
															
															{!!Form::close()!!}
				
															</li>
														</ul>
													</li>
												</ul>
											</td> 
				   
		
		
					</tr>
			@endforeach

			
			</tbody>
			</tbody>
    </table>

	</div>








	<!--Support Table of This Company-->
	





<div class="row">


	<div class="col-md-12">
		



	
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
	
	