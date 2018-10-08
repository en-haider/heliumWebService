
<div class="page-container">
<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-main">
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user-material">
                <div class="category-content">
                    <div class="sidebar-user-material-content">
                        <a href="#"><img src="assets/images/demo/users/face11.jpg" class="img-circle img-responsive" alt=""></a>
                        <h6>Helium Web Support </h6>
                        <span class="text-size-small">Control Panel</span>
                    </div>
                                                
                    <div class="sidebar-user-material-menu">
                        <a href="#user-nav" data-toggle="collapse"><span>{{Auth::check() ? "Login" : "Register"}}</span> <i class="caret"></i></a>
                    </div>
                </div>

              

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                
                <div class="navigation-wrapper collapse" id="user-nav">
                    <ul class="navigation">
                        <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                        <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                        <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                        <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>

                
                    </ul>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li><a href="/"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                                                        <li><a href="/company"><i class="icon-airplane2"></i> <span>Company</span></a></li>
                                                        
                                  
                                                              <li>
                            <a href="/support"><i class="icon-wrench"></i> <span>Support</span></a>
                            @can('isAdmin')
                            <a href="/companyfeedback"><i class="icon-rotate-ccw3"></i> <span>Company FeedBack</span></a>
                            <a href="/companyerror"><i class="icon-fire"></i> <span>Company Errors</span></a>
                            <a href="/users"><i class="glyphicon glyphicon-user"></i> <span>Members</span></a>
                            @endcan
                                                                  
                            </li>
                                                            
                         
                                                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i><span>Logout</span></a></li>
                       
                                                          
                                                          
                        
             

                    </ul>
                </div>
            </div>
            <!-- /main navigation -->

        </div>
    </div>

    <div class="content-wrapper">
        <!-- Page header -->
        
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">__</span> __
                      
                    
                        <div class="container">
                         
                        </div>
                    
                    </h4>
                    
                </div>
                   
                          
                <div class="heading-elements">
                    <div class="heading-btn-group">
                    @can('isAdmin')
                         <a href="/pcs" class="btn btn-link btn-float text-size-small has-text"><i class="glyphicon glyphicon-floppy-saved" style="color:#2196f3;font-size: 23px;"></i><span>PC Register </span></a>
                        <a href="/PcsNotRegister" class="btn btn-link btn-float text-size-small has-text"><i class="glyphicon glyphicon-floppy-remove" style="color:#2196f3;font-size: 23px;"></i> <span>PC Not Register</span></a>
                        <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                    @endcan
                    </div>
                </div>
            </div>
                       
                           @include('layouts.layout.alert')
                          
                     


            <div class="breadcrumb-line breadcrumb-line-component">
                <ul class="breadcrumb">
                            <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="../@yield('main_page')">@yield('main_page')</a></li>
                           <li class="active">@yield('active_page')</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <li><a href="#"><i class="icon-comment-discussion position-left"></i> {_pagename}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear position-left"></i>
                            Settings
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                            <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                            <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-gear"></i>
                            @if(Auth::check())
                            {{Auth::user()->name}}
                              @endif
                             </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div



