
<?php
	session_start();
	include '../session.php';
	if (isset($_GET['id_wo'])){
		$id_wo=$_GET['id_wo'];
	}
	include "get_data.php";
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

		
		<script type="text/javascript" src="../library/js/jquery-latest.min.js"> 
	</script> 
	<script> 
		$(document).ready(function(){ 
			//filter base on status

		    console.log("sas");
		    $("#get_data").load("get_data.php","op=get_all_assignment");
		    $("#get_data_fo").load("get_data.php","op=get_fo");
		    var id_wo="<?php echo $id_wo; ?>";
		    $("#get_one_wo").load("get_data.php","op=get_one_wo&id_wo="+id_wo);

		    //filter base on divre,sto,area
		    $("#filterSTO").load("get_data.php","filter=get_sto_all");
		 //    $("#filterDivre").load("get_data.php","filter=get_divre");
			// $("#filterDivre").change(function(){
			// 	divre=$("#filterDivre").val();
			// 	$("#filterSTO").load("get_data.php","filter=get_sto&divre="+divre);
			// });
			// $("#filterSTO").change(function(){
			// 	sto=$("#filterSTO").val();
			// 	$("#filterArea").load("get_data.php","filter=get_area&id_sto="+sto);
			// });

		}); 
	</script> 
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		<!-- header -->
		<div id="header" class="navbar">
			<div class="navbar-inner">
				<!-- company or app name -->
				<a class="brand hidden-phone" href="../">Smart Work Order</a>
				
				
				<ul class="nav pull-right">
					
					<!-- dropdown user account -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-large icon-user"></i>
						</a>
						
						<ul class="dropdown-menu dropdown-user-account">
						
							<?php

								include("../connect.php");
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
						<i class="icon-table"></i> Work Order
					</h2>
					
					<!-- <div class="page-info hidden-phone">
						<ul class="stats">
							<li>
								<span class="large text">8854</span>
								<span class="mini muted">semua</span>
							</li>
							<li>
								<span class="large text-warning">2354</span>
								<span class="mini muted">belum</span>
							</li>
							<li>
								<span class="large text-info">453</span>
								<span class="mini muted">dihubungi</span>
							</li>
							<li>
								<span class="large text-success">5673</span>
								<span class="mini muted">diterima</span>
							</li>
							<li>
								<span class="large text-error">15</span>
								<span class="mini muted">ditolak</span>
							</li>
							<li>
								<span class="large muted">575</span>
								<span class="mini muted">selesai</span>
							</li>
						</ul>
					</div> -->
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="../">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="../wo/done.php">Selesai</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Detail Selesai</li>
				</ul>

				
				<!-- post wrapper -->				
				<div class="row-fluid">

					<div class="span12">
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Foto Instalasi</h3>
								
							</div>
							<!-- ./ widget header -->
							<div class="row-fluid">
								<?php
									$get_dataaa->getPicture($_GET['id_wo']);
								?>
							</div>
						</div>
					</div>
				</div>
				<?php if ($_GET['wo']=="wm"){
					echo '
				<div class="row-fluid">
					<div class="span12">
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Foto Migrasi</h3>
								
							</div>
							<!-- ./ widget header -->
							<div class="row-fluid">';
									$get_dataaa->getPictureMigrasi($_GET['id_wo']);
					echo '
							</div>
						</div>
					</div>
				</div>
				<!-- ./ post wrapper -->';
				}
				?>

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
		<script src="../library/plugins/jmapping/markermanager.js"></script>
		<script src="../library/plugins/jmapping/StyledMarker.js"></script>
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