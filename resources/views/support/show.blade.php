
<?php
use App\support_status;
use App\support_type;
use App\companies;
use App\support;
use App\User;
?>

@extends('layouts.master')


@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection


	 @section('content') <!-- Content area -->
	<!-- Title with right icon -->
	<div class="content">
    <div class="panel panel-white">
								<div class="panel-heading">
									<h6 class="panel-title"><i class="icon-airplane2"></i> {{companies::find($support->companies_id)->co_name}}  /  <i class="glyphicon glyphicon-user"></i> {{user::find($support->user_id)->name}}  /  <i class="glyphicon glyphicon-calendar"></i>  {{$support->updated_at->toDateString()}} <a href="#" </a></i>								
									<span class="panel-title" style="float:right"> <span class="{!!$support->support_status->class_name!!}"> {{$support->support_status->sup_status}}</span></span></h6>
									
								</div>
								
								<div class="panel-body">
								{{$support->sup_details}} 
								</div>
							</div>
							</div>
							<!-- /title with right icon -->
			


@section('scripts')
{!! Html::script('js/parsley.min.js')!!}
@endsection















































			

        @endsection


