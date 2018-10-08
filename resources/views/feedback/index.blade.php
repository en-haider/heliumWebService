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
companyfeedback
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

        <h5 class="panel-title">Company Feedback Table </h5>
       
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
                <th>Helium Version</th>    
                <th>Feedback Type</th>  
                <th>Feedback Details</th>   
                <th>Feedback Date</th>             
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($feedbacks as $feedback)
            <tr>
         
            
            

            <td>
            @isset(pccode::find($feedback->fbfk_pccode)->pc_activename)
            {{companies::find(pccode::find($feedback->fbfk_pccode)->companies_id)->co_name}}
            @endisset        
            </td>  

            <td>
            @isset(pccode::find($feedback->fbfk_pccode)->pc_activename)
            {{pccode::find($feedback->fbfk_pccode)->pc_activename}}
            @endisset
            </td> 

            <td>{{$feedback->fb_username}}</td> 
           
           
            <td>{{$feedback->fb_version}}</td> 
            <td>{{feedback_types::find($feedback->feedback_types_id)->tfb_name}}</td> 
            <td>{{$feedback->fb_content}}</td> 
            <td>{{$feedback->fb_date}}</td> 
            <td></td> 
 
      


            </tr>
            @endforeach


            

        </tbody>
    </table>
</div>
<!-- /basic datatable -->
@endsection





