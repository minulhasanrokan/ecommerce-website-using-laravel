<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
	<link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">

	<link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>
		<link id="ie-style" href="{{asset('backend/css/ie.css')}}" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="{{asset('backend/css/ie9.css')}}" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
	<style type="text/css">
		.cleditorMain{
			width: 99% !important;
		}
		.input-xlarge{
			width: 98% !important;
		}
		select{
			width: 99.5% !important;
		}
		.bootstrap-tagsinput{
			width: 97% !important;
		}
	</style>
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Metro</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                     
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white tasks"></i>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim orange">80</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>	
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						<li>
							<a class="btn" href="#">
								<i class="halflings-icon white wrench"></i>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>
									{{Session::get('admin_name')}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="{{url('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
	<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Categories</a>
							<ul>
								<li><a class="submenu" href="{{url('/categories/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>
								<li><a class="submenu" href="{{url('/categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Category</span></a></li>
							</ul>	
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Sub Categories</a>
							<ul>
								<li><a class="submenu" href="{{url('/sub-categories/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Sub Category</span></a></li>
								<li><a class="submenu" href="{{url('/sub-categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Sub Category</span></a></li>
							</ul>	
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Brands</a>
							<ul>
								<li><a class="submenu" href="{{url('/brands/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Brand</span></a></li>
								<li><a class="submenu" href="{{url('/brands')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Brands</span></a></li>
							</ul>	
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> units</a>
							<ul>
								<li><a class="submenu" href="{{url('/units/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add unit</span></a></li>
								<li><a class="submenu" href="{{url('/units')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All units</span></a></li>
							</ul>	
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products Size</a>
							<ul>
								<li><a class="submenu" href="{{url('/sizes/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Size</span></a></li>
								<li><a class="submenu" href="{{url('/sizes')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Sizes</span></a></li>
							</ul>	
						</li>


						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products Colors</a>
							<ul>
								<li><a class="submenu" href="{{url('/colors/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Color</span></a></li>
								<li><a class="submenu" href="{{url('/colors')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Colors</span></a></li>
							</ul>	
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products</a>
							<ul>
								<li><a class="submenu" href="{{url('/products/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Product</span></a></li>
								<li><a class="submenu" href="{{url('/products')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Products</span></a></li>
							</ul>	
						</li>

						<li><a href="{{url('/manage-order')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Order</span></a></li>
						
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			@yield('content')

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
	<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
		<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.ui.touch-punch.js')}}"></script>
	
		<script src="{{asset('backend/js/modernizr.js')}}"></script>
	
		<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
	
		<script src='{{asset('backend/js/fullcalendar.min.js')}}'></script>
	
		<script src='{{asset('backend/js/jquery.dataTables.min.js')}}'></script>

		<script src="{{asset('backend/js/excanvas.js')}}"></script>
		<script src="{{asset('backend/js/jquery.flot.js')}}"></script>
		<script src="{{asset('backend/js/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('backend/js/jquery.flot.stack.js')}}"></script>
		<script src="{{asset('backend/js/jquery.flot.resize.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.chosen.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
		
		<script src="{{asset('backend/js/jquery.cleditor.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.noty.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.elfinder.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.raty.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.iphone.toggle.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.uploadify-3.1.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.imagesloaded.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.masonry.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.knob.modified.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
	
		<script src="{{asset('backend/js/counter.js')}}"></script>
	
		<script src="{{asset('backend/js/retina.js')}}"></script>

		<script src="{{asset('backend/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
