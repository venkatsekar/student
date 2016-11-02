 
 <!DOCTYPE html>
 <html>
	<head>
		<link rel="stylesheet" href="<?=BASEURL;?>public/assets/global/css/bootstrapnew.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<style>
			.hor-menu{
				height: 100px;
				
			}
			.page-header-menu{
				background: #414042!important;
				height: 450px!important;				
			}
			.hor-menu li a{
				background:transparent!important;
				color: #ffffff;
				font-size: 28px!important;
				font-family: source sans pro!important;
				font-weight: 200!important;
				line-height: 1!important;
				letter-spacing: 1.5px!important;
				margin-left: 5px!important;
				margin-top: 15px;
			}
			.navbar-nav ul li a:hover{
				background: transparent!important;
			}
			.hor-menu ul li a label:hover{
				cursor:pointer;
			}
			/*Navigation Active Tab*/
			body#setting a#nav-setting{
				color: #ff5f87;
			}
			body#create #nav-create,body#dashboard #nav-dashboard ,body#assign #nav-assign, body#dispatch #nav-dispatch {
				border-bottom: 3px solid #ff5f87;
				padding-bottom: 15px;
				color: #ff5f87;
				font-weight:bold;
			}

			/*User_logout*/
			#nav-user{
				margin: -45px 40px 0 0px;
			}

			/*Media Screen*/
			@media screen and (max-width: 850px){
			.hor-menu ul li a{
				font-size: 20px!important;
				margin:0px!important; 
			}
			}

			@media screen and (min-width: 992px) and (max-device-width: 1200px){
			.hor-menu ul li a{
				font-size: 23px!important;
				letter-spacing: 1px!important;
				margin-top: 20px!important;
				}
			}
			@media screen and (min-width: 1599px){    

			}
		</style>
	</head> 
	<body>
		<div class="page-header" >
			<!-- BEGIN HEADER TOP -->
			<div class="page-header-top">
				<a href="javascript:;" class="menu-toggler"></a>
				<!-- END TOP NAVIGATION MENU -->
				<div class="page-header-menu" >
					<div class="container">
						<div class="hor-menu">
							<ul class="nav navbar-nav" style="position: relative;">
								<li class="menu-dropdown classic-menu-dropdown active">
									<a href="<?=BASEURL;?>dashboard"> <label><span class="trace"></span> <span style="color: #ffffff;">TRANSPOTS</span></label></a>
								</li>
								<li class="menu-dropdown classic-menu-dropdown">
									<a href="<?=BASEURL;?>dashboard"> <label id="nav-dashboard">Dashboard</label></a>
								</li>
								<li class="menu-dropdown mega-menu-dropdown  ">
									<a href="<?=BASEURL;?>group/create"> <label id="nav-create">Create</label></a>
								</li>
								<li class="menu-dropdown classic-menu-dropdown ">
									<a href="<?=BASEURL;?>assign"> <label id="nav-assign">Assign</label></a>
								</li>
								<li class="menu-dropdown mega-menu-dropdown  mega-menu-full">
									<a href="<?=BASEURL;?>dispatch"> <label id="nav-dispatch">Dispatch</label></a>
								</li>
								<!--<li class="menu-dropdown classic-menu-dropdown ">
									<a href="javascript:;"> <label id="nav-pod">POD</label></a>
								</li>-->
								<li class="menu-dropdown classic-menu-dropdown ">
									<a href="<?=BASEURL;?>invoice"> <label id="nav-invoice">Invoice</label></a>
								</li>
								<li class="menu-dropdown classic-menu-dropdown active">
								   <a id="nav-setting" href="<?=BASEURL;?>settings/"><label><i class="icon-settings"></i></label></a>
								</li>
							</ul>
						</div>
						<!-- END MEGA MENU -->
					</div>
				</div>
			</div>
			<!--user login-->
			

			<!-- END HEADER MENU -->
		</div> 
	</body>
 </html>       

