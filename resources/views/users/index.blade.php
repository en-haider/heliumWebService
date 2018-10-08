<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\Support;
use App\User;
use Carbon\Carbon;
?>

@extends('layouts.master')


@section('main_page')
users
@endsection

@section('active_page')
Members
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
        <p> {!!Html::linkRoute('users.create',' Add New Member ',null,array('class'=>'icon-plus2 btn btn-primary'))!!}</p>
        <h5 class="panel-title">Members Table </h5>
        
       
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
                <th>User Name</th>    
                <th>Email</th>       
                <th>Type</th>    
                <th>Last Login</th>        
                <th class="text-center">Actions</th>
            </tr>
        </thead>



        <tbody>
           @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_type}}</td>
                <td>d</td>
               
                <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
                                               
													<li>{!!Html::linkRoute('users.show',' show ',array($user->id),array('class'=>'icon-file-pdf'))!!} </li>
													<li>{!!Html::linkRoute('users.edit',' Edit ',array($user->id),array('class'=>'icon-file-pdf'))!!}   </i>
													<li>
                                                    {!!Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE'])!!}

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





