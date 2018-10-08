<?php 

use App\gov;

?>

@extends('layouts.master')

@section('main_page')
company
@endsection

@section('active_page')
Edite {{$companies->co_name}} Company
@endsection

@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection

	 @section('content') 
     <!-- Content area -->
	<div class="content">
		<!-- Form horizontal -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Update Information of <span style="color:#44a0e8">{{$companies->co_name}}</span> Company</h5>
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
				
            	
            
           
           
            {!! Form::model($companies,['route'=>['company.update',$companies->id],'method'=>'PATCH','class' => 'form-horizontal','data-parsley-validate'=>' '])!!}

		    
                    
                <div class="form-group form-group-lg">                       
                     {!!Form::label('title', 'Support Details', ['class' => 'control-label col-lg-2'])!!}
                        <div class="col-sm-10 col-md-4">                          
                             {!! Form::text('co_name',null, array('class'=>'form-control','required'=>'')) !!}              
                        </div>
                </div>




                    <div class="form-group form-group-lg">
                        
                        {{Form::label('title', ' Company Alies', ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10 col-md-4">
                             {!! Form::text('co_alies',null, array('class'=>'form-control','required'=>'')) !!}  
                        </div>
                    </div>
                    
					
					
					    <div class="form-group form-group-lg">                      
                             {{Form::label('title', ' Company City', ['class' => 'col-sm-2 control-label'])}}           
                            <div class="col-sm-10 col-md-4">  


                                        <select name="cofk_gov" class="form-control">
                                            <option value="{{$companies->cofk_gov}}" >
                                            <?php echo $com_gov =($com_gov=gov::find($companies->cofk_gov) ) ?   $com_gov->gov_nameAr : null;	?>
                                            </option>                
                                            @foreach(gov::all() as $gov)	
                                                    <option value="{{$gov->id}}">
                                                        {{$gov->gov_nameAr}}
                                                    </option>
                                            @endforeach
                                        </select>






                                        
                            </div>
                        </div>
					
					
                    <div class="form-group form-group-lg">                    
                        {{Form::label('title', 'Company Address', ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10 col-md-4">
                                {!! Form::text('co_address',null, array('class'=>'form-control','required'=>'')) !!}  
                        </div>
                    </div>
                    

                     <div class="form-group form-group-lg">                     
                        {{Form::label('title', 'Company Phone', ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10 col-md-4">
                           
                            {!! Form::text('co_phone',null, array('class'=>'form-control','required'=>'')) !!} 
                        </div>
                    </div>

                    
                      <div class="form-group form-group-lg">
                        
                        {{Form::label('title', 'Company Sql Server Version', ['class' => 'col-sm-2 control-label'])}}
                    
                        <div class="col-sm-10 col-md-4">
    
                                   {!! Form::text('co_sqlserver_version',null, array('class'=>'form-control','required'=>'')) !!} 
                        </div>
                    </div>
               

					
					 <div class="form-group form-group-lg">
                       
                        {{Form::label('title', 'Company Active Date', ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10 col-md-4">
                                {{Form::date('co_active_date',null,array('class'=>'form-control','id'=>''))}}

                        </div>
                    </div>
					
                    <div class="form-group form-group-lg">
                   
                   {{Form::label('title', 'Co Active', ['class' => 'col-sm-2 control-label'])}}
                   <div class="col-sm-10 col-md-4">
                   {{Form::radio('co_active', '1',true,['class' => ''])}} YES
                    {{Form::radio('co_active', '0',false,['class' => ''])}}  No
                              
                       
                   </div>

                   

               </div>

					
					   <div class="form-group form-group-lg">
                       
                        {{Form::label('title', 'Company Backup', ['class' => 'col-sm-2 control-label'])}}
                        <div class="col-sm-10 col-md-4">
                            
                                {{Form::radio('co_is_backup', '1',true,['class' => ''])}} YES
                                {{Form::radio('co_is_backup', '0',false,['class' => ''])}}  No
                                   
                            
                        </div>
                    </div>
					

                     <div class="form-group form-group-lg">
                  
                        {{Form::label('title', 'is reseve', ['class' => 'col-sm-2 control-label'])}}

                        <div class="col-sm-10 col-md-4">
                          
                                {{Form::radio('co_rec_money', '1',true,['class' => ''])}} YES
                                {{Form::radio('co_rec_money', '0',false,['class' => ''])}}  No
                        </div>

                              
                    </div>
                  
                   
                     
                    <div class="form-group form-group-lg">
                      
                        {{Form::label('title', 'Details', ['class' => 'col-sm-2 control-label'])}}

                        <div class="col-sm-10 col-md-4">
                           
                                 {!! Form::textarea('co_details',null, array('class'=>'form-control','rows' => 5, 'cols' => 5,'required'=>'','maxlength'=>'255')) !!}
                   
                        </div>
                    </div>
                    

					
                   
                   
                     <div class="form-group form-group-lg">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Update" class="btn btn-primary btn-lg"/>
                        </div>
                    </div>
					</fieldset>
                    {!! Form::close() !!}


	

		  @include('layouts.layout.errors')

		</div><!-- /form horizontal -->
		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div><!-- /footer -->
	</div><!-- /content area -->
	<!-- /main content -->
	<!-- /page content -->
	<!-- /page container -->
	@endsection

	
	@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	@endsection
	
	<script>
    $('#datetimepicker').datetimepicker({
    format: 'dd-mm-yyyy'
    });

    </script>