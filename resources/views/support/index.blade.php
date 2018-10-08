<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\Support;
use App\User;
?>

@extends('layouts.master')


@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection


@section('active_page')
company
@endsection

@section('content')

<!-- Content area -->
<div class="content">

<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
   <p> {!!Html::linkRoute('support.create',' Add New Support ',null,array('class'=>'icon-plus2 btn btn-primary'))!!}</p>
        <h5 class="panel-title">Support Table </h5>
       
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
                <th>Company Name</th>    
                <th>Support Name</th>       
                <th>Support Details</th>
                <th>Support Type</th>
                <th>Support Status</th>
                <th>support date</th>              
                <th class="text-center">Actions</th>
            </tr>
        </thead>



        <tbody>
            @foreach($supports as $support)
            <tr>
         
            
            <!--<td>{{$support->sup_name}}</td>-->
            <td>{{companies::find($support->companies_id)->co_name}}</td>  
            <td>{{user::find($support->users_id)->name}}</td> 
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
    </table>
</div>
<!-- /basic datatable -->
@endsection


@section('scripts')
<script> 


   $('#sweet_combine').on('click', function() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                swal({
                    title: "Deleted!",
                    text: "Your imaginary file has been deleted.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
    });

  
</script>


@endsection
