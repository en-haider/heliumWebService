<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\Support;
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
        <h5 class="panel-title">Basic datatable</h5>
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

                <th></th>
                
                <!--<th>Support Name</th>-->
                <th>Company Name</th>           
                <th>Support Details</th>
                <th>Support Type</th>
                <th>Support Status</th>
                <th>support date</th>              
                <th class="text-center">Actions</th>
            </tr>
        </thead>


        <?php
      
        ?>
        <tbody>
    

            

        </tbody>
    </table>
</div>
<!-- /basic datatable -->
@endsection





