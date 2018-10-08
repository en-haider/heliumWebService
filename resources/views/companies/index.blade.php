<?php 
use App\support_status;
use App\support_type;
use App\companies;
use App\Support;
use App\gov;

?>

@extends('layouts.master')

@section('main_page')
company
@endsection



@section('main_sidvar')
@include('layouts.layout.main_sidbar')
@endsection

@section('content')

  <p></p>
              <div class="content">
		<!-- Form horizontal -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">All Company</h5>
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
				
            {!!Html::linkRoute('company.create',' Add New Company ',null,array('class'=>'icon-plus2 btn btn-primary'))!!}
    

            <p></p>
                <div class="row">
                


                  @foreach($companies as $company)      
                	<div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading bg-blue" style=" background-color:#2196f3;<?php  echo $com_active =$company->co_active==1 ? 'background-color:#2196f3' :'background-color:red';  ?>">
                                    <h6 class="panel-title">
                                    <i class="icon-circle2" style="font-size:5px;position: relative;left: -5px;color:#2196f3"></i>
                                    {!!Html::linkRoute('company.show',$company->co_name ,$company->id,array('class'=>''))!!}
                                    
                                    </a>

                                     <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
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


  
          
                                    <p></p> <span style="font-weight:bold">Last Login : </span><?php echo $com_version =($com_version=$company->LastLoginByComId($company->id) ) ? $company->get_DateLastLogin($com_version->created_at)  : null;  ?>
                                    <p></p> <span style="font-weight:bold">Version :  </span><?php echo $com_version =($com_version=$company->LastLoginByComId($company->id) ) ? $com_version->l_version : null;  ?> 
                                    <p></p><span style="font-weight:bold"> Server : </span><?php echo $com_server =($com_server=$company->LastLoginByComId($company->id) ) ? $com_server->l_server : null;  ?> 
                                    <p></p>
                                    <span style="font-weight:bold">
                                    <?php 
                                    echo $com_city =($com_city=gov::find($company->cofk_gov) ) ? $com_city->gov_nameAr  : null;          
                                    ?>
                                    </span>
                                   <div class="" style="float:right;position:relative;right:8px;">
									  
                                   
                                    {!!Html::linkRoute('support.create',' ',array('id'=>$company->id),array('class'=>'icon-wrench'))!!} 
                                    </div>

                                     <!--<a href="company.php?do=com_delete&amp;id=66" onclick="return confirm('Are You Sure Of Deleted This Company ?!');"><i class="glyphicon glyphicon-trash" style="float:right;position:relative;right:8px;"></i></a> <a href="company.php?do=com_block&amp;id=66&amp;is_block=0" onclick="return confirm('Are You sure to Block This Company');"><i class="glyphicon glyphicon-ban-circle" style="float:right;position:relative;right:15px;color:"></i></a>
                               --> </div>
                            </div>
                        </div>

                        @endforeach
                                    
                </div>

                <div class="text-center">{!!$companies->links();!!}</div>


	

	

		</div><!-- /form horizontal -->
		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div>
	</div>


@endsection





