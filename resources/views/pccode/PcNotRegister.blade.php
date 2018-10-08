<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\Support;
use App\User;
use App\loginmap;
?>

@extends('layouts.master')


@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection


@section('content')

<!-- Content area -->
<div class="content">

<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
 
        <h5 class="panel-title">PCs Not Register Table </h5>
       
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
                <th>PC ActiveName</th>    
                <th>PC User Name</th>       
                <th>Company Name</th>
                <th>Helium Version</th>
                <th>Last Login</th>
                <th></th>              
            
            </tr>
        </thead>


        <?php
      
        ?>
        <tbody>
            @foreach($pccodes as $pccode)
            <tr>
            <td>{{$pccode->pc_activename}}</td>
            <td></td>
            <td><span class="label label-danger">{{companies::find($pccode->companies_id)->co_name}} </span></td>
            <td>{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_version')->last()}}</td>
            <td>{{loginmap::where('pccodes_id',$pccode->id)->get()->pluck('l_date')->last()}}</td>
            <td> {!!Html::linkRoute('pcs.edit','Register',array($pccode->id),array('class'=>'btn btn-primary legitRipple'))!!}  </td>
            </tr>
            @endforeach


            

        </tbody>
    </table>
</div>
<!-- /basic datatable -->
@endsection





