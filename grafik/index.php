<?php
	session_start();
	include '../session.php';
	if(isset($_GET['p'])){$limit_start=($_GET['p']);}else{$limit_start="0";};
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Smart Work Order</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Olas Navigator" />

		<!-- required styles -->
		<link href="../library/assets/css/bootstrap.css" rel="stylesheet" />
		<link href="../library/assets/css/bootstrap-responsive.css" rel="stylesheet" />
		<link href="../library/css/styles.css" rel="stylesheet" />
		<script type="text/javascript" src="../library/js/jquery-latest.min.js"></script>
		<script> 
			$(document).ready(function(){ 

			    $("#get_grafik").load("get_data.php","op=get_grafik");
			}); 
		</script> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		<!-- header -->
		<div id="header" class="navbar">
			<div class="navbar-inner">
				<!-- company or app name -->
				<a class="brand hidden-phone" href="index.html">SMART WORK ORDER</a>
				
				
				<ul class="nav pull-right">
					
					<!-- dropdown user account -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-large icon-user"></i>
						</a>
						
						<ul class="dropdown-menu dropdown-user-account">
						
							<?php

								include("../akun/connect.php");
								include '../akun_nav.php';
							?>
							
						</ul>
					</li>
					<!-- ./ dropdown user account -->
				</ul>
				
			</div>
		</div>
		<!-- end header -->			
		
		<div id="left_layout">
			<!-- main content -->
			<div id="main_content" class="container-fluid">
			
				<!-- page heading -->
				<div class="page-heading">
				
					<h2 class="page-title muted">
						<i class="micon-stats-up"></i> Grafik
					</h2>
					
					<!-- <div class="page-info hidden-phone">
						<ul class="stats">
							<li>
								<span class="large text-warning">2354</span>
								<span class="mini muted">visitors</span>
							</li>
							<li>
								<span class="large text-info">4523</span>
								<span class="mini muted">members</span>
							</li>
							<li>
								<span class="large text-success">5673</span>
								<span class="mini muted">orders</span>
							</li>
							<li>
								<span class="large text-error">15</span>
								<span class="mini muted">cancellation</span>
							</li>
						</ul>
					</div> -->
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="#">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Charts</li>
				</ul>
				
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span12">
						<div class="well widget">
							<div class="widget-header">
								<h3 class="title">Grafik</h3>
							</div>
							<!-- ** vertical bar chart ** -->
							<div class="row-fluid">
								<div class="span12" id="get_grafik">
							<!-- ** ./ horizontal bar chart ** -->
								</div>
								<!-- <div class="span3">
									<div id="pie-div" style="width:100%;height:300px;" 
										data-content="[['', 12],['', 9], ['', 14]]" 
										data-colors='[ "#425eb8","#b64b53","#409627"]'>
								        </div>

								</div> -->
							</div>
							<!-- ** ./ vertical bar chart ** -->
						</div>
					</div>
					
				</div>
				<!-- ./ post wrapper -->

			</div>
			<!-- end main content -->
			
			<!-- sidebar -->
			<ul id="sidebar" class="nav nav-pills nav-stacked">
				<?php require "../nav.php"; ?>
			</ul>
			<!-- end sidebar -->
		</div>
		<!-- base -->
		<script src="../library/assets/js/jquery.js"></script>
		<script src="../library/assets/js/bootstrap.min.js"></script>
		
		<!-- addons -->
		<script src="../library/plugins/chart-plugins.js"></script>
		<script src="../library/plugins/jquery-ui-slider.js"></script>
		<script src="../library/plugins/redactor/redactor.min.js"></script>
		<script src="../library/plugins/jmapping/jquery.metadata.js"></script>
		<script src="../library/plugins/jmapping/jquery.jmapping.min.js"></script>
		<script src="../library/plugins/jquery.uniform.js"></script>
		<script src="../library/plugins/chosen.jquery.min.js"></script>
		<script src="../library/plugins/bootstrap-datepicker.js"></script>
		<script src="../library/plugins/jquery.timePicker.min.js"></script>
				
		<!-- plugins loader -->
		<script src="../library/js/loader.js"></script>
	</body>
</html>