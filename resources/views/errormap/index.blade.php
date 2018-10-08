<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\Support;
use App\User;
use App\pccode;
use App\feedback_types;
?>

@extends('layouts.master')


@section('main_page')
companyerror
@endsection

@section('active_page')

@endsection

@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection


@section('content')

<!-- Content area -->
<div class="content">

<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">

        <h5 class="panel-title">Company Error Map Table </h5>
       
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
                <th>PC Active Name</th>       
                <th>User Name</th>
                <th>Pc Name</th>
                <th>Helium Version</th>    
                <th>Error Content</th>  
                <th>Error Date</th>                          
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($errors as $error)
            <tr>
         
            
           <td>
           @isset(pccode::find($error->pccodes_id)->id)
           {{companies::find(pccode::find($error->pccodes_id)->companies_id)->co_name}}
           @endisset 
           </td>


         
           <td>
           @isset(pccode::find($error->pccodes_id)->id)
           {{pccode::find($error->pccodes_id)->pc_activename}}
           @endisset 
           </td>

           <td>{{$error->e_username}}</td>
           <td></td>
           <td>{{$error->e_version	}}</td>

           
           <td>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".<?php echo $error->e_id; ?>">{!! substr($error->e_error, 0, 50) !!}....</button>

          

           



                <!-- Danger modal -->
					<div id="modal_theme_danger" class="modal fade <?php echo $error->e_id; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-danger">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h6 class="modal-title">
                                        @isset(pccode::find($error->pccodes_id)->id)
                                        {{companies::find(pccode::find($error->pccodes_id)->companies_id)->co_name}}
                                        @endisset 
                                    </h6>
								</div>

								<div class="modal-body">
									
									<p>{{$error->e_error}}</p>

									<hr>

								</div>
							</div>
						</div>
					</div>
					<!-- /default modal -->
                                    
           </td>




           <td>{{$error->e_date}}</td>
           <td></td>
      


            </tr>
            @endforeach


            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
               
                </div>
            </div>
            </div>




            

        </tbody>
    </table>

    <div class="text-center">{!!$errors->links();!!}</div>
</div>
<!-- /basic datatable -->
@endsection





