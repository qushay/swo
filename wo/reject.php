
<?php
	session_start();
	include '../session.php';
	require "get_data_langsung.php";
	$get_data=new get_data_langsung();
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
		<style>
			.datepicker{position:absolute;z-index:1151;}
			.timePicker{position:absolute;z-index:10000;}
			#ModalCall {
			    position: absolute;
			    z-index:1049;
			}
		</style>
		<script src="../library/assets/js/jquery.js"></script>
	</script> 
	<script> 
		$(document).ready(function(){ 
			var sto="";
			//filter base on status
		    $("#get_data").load("get_data.php","op=get_reject_oleh_fo_pelanggan&sto="+sto);
		    $("#get_pagination").load("get_data.php","op=get_pagination&t=reject");

		    $("#filterPenelepon").load("get_data.php","op=get_penelepon_by_sto&sto="+sto);
		    $("#filterSTO").change(function(){
		    	sto= $("#filterSTO").val();
		    	$("#filterPenelepon").load("get_data.php","op=get_penelepon_by_sto&sto="+sto);
		    	$("#get_data").load("get_data.php","op=get_reject_oleh_fo_sto&sto="+sto);
		    });
		    $("#filterPenelepon").change(function(){
		    	penelepon=$("#filterPenelepon").val();
		    	$("#get_data").load("get_data.php","op=get_reject_oleh_fo_sto&sto="+sto+"&penelepon="+penelepon);
		    });

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
					<!-- 
					<div class="page-info hidden-phone">
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
					<li class="text-info">Work Order</li>
				</ul>

				
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span12">
						<img src="../library/images/loader.gif" id="loading" style="display:none"> 
						
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">List Pelanggan</h3>
								
								<?php
									if($hak=="super"||$hak=="admin"){
										echo '
										<div class="widget-nav span2" style="margin-left:5px;">
											<select id="filterPenelepon" class="span12" place-holder="Pilih Penelepon" style="margin-top:3px;">	
												<option value="">Pilih Penelepon</option>
											</select>
										</div>';
									}
									if($hak=="super"){
										echo '
										<div class="widget-nav span2" style="margin-left:5px;">
											<select id="filterSTO" class="chzn-select-deselect span12" place-holder="Pilih STO">';
												$get_data->getSTO_all();
										echo '		
											</select>
										</div>';
									}
									
								?>
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table table-condensed table-hover" >
									<thead>
										<tr>
											<th>#</th>
											<th>ID</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>DP Lama</th>
											<th>Jenis ONT</th>
											<th>POTS</th>
											<th>Speedy</th>
											<th>IPTV</th>
											<th>Ket</th>
										</tr>
									</thead>
									<!-- load isi table -->
									<tbody id="get_data"></tbody>

								</table>
							</div>
							<!-- ./ widget content -->
						</div>
						<!-- ./ widget -->
						<div class="pagination pagination-medium" style="margin-top: 0px;margin-bottom: 0px;">
							<ul id="get_pagination">

							</ul>
						</div>
					</div>
				</div>

				<!-- ./ post wrapper -->

			<!-- ************ -->
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