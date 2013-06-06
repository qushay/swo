<?php
	session_start();
	include '../session.php';
	include '../connect.php';
	require 'get_data.php';
	$get_data1=new get_data();
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
				$("#button_simpan").click(function(){
					var id_sto=$("#inputID").val();
					var nama_sto=$("#inputNama").val();
					var prov=$("#inputProvinsi").val();
					var alamat=$("#inputAlamat").val();
					var lintang=$("#inputLintang").val();
					var bujur=$("#inputBujur").val();
					var datanya="&id_sto="+id_sto+"&nama_sto="+nama_sto+"&prov="+prov+"&alamat="+alamat+"&lintang="+lintang+"&bujur="+bujur;
					$.ajax({ 
				        url: "store_data.php", 
				        data: "op=insert"+datanya, 
				        cache: false, 
				        success: function(msg){ 

			       		} 
			        }); 
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
				<a class="brand hidden-phone" href="">Smart Work Order</a>
				
				
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
						<i class="micon-location"></i> Maps
					</h2>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.html">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Maps</li>
				</ul>
				
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span12">
						
						
						<div class="well widget">
							<div class="widget-header">
								<?php 
									if ($hak=="super"){
										echo '<div class="title">
											<a href="#ModalSto" class="btn btn-small btn-success" role="button" data-toggle="modal"><i class="icon-plus"></i> STO</a>
										</div>';
									}else{
										echo '<h3 class="title">Peta</h3>';
									}
								?>
								
								<div class="widget-nav" style="margin-top:-4px;">
									<input id="autocompleteCity" type="hidden" placeholder="Masukan Kota" class="input-navbar" />
								</div>

							</div>
							
							<div class="row-fluid">
								<div class="span10">
									<div id="map-places-finder" class="well widget map-wrapper bs-map" style="height:450px;">
									
									</div>
								</div>
								<div class="span2" style="margin-left:0;">
									<div class="tabbable tabs-custom" style="margin-bottom:0; width:200px;">
										<ul class="nav nav-tabs">
											<li class="active span5"><a href="#home" data-toggle="tab"><i class="micon-home"></i> STO</a></li>
											<li class="span7"><a href="#profile" data-toggle="tab"><i class="micon-user-2"></i> Field Ops</a></li>
										</ul>

										<div class="tab-content">
											<div class="tab-pane fade in active" id="home">
												<div class="well widget map-wrapper">
													<div id="listing" style="height:380px;overflow:auto;">
														<table id="resultsTable" class="table table-striped"><tbody id="results"></tbody></table></div>
												</div>
											</div>
											<div class="tab-pane fade" id="profile">
												<div class="well widget map-wrapper">
													<div id="listing" style="height:380px;overflow:auto;">
														<table id="resultsTable" class="table table-striped"><tbody id="results_fo"></tbody></table></div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>

												
					</div>
				</div>
				<!-- ./ post wrapper -->
				
			</div>
			<!-- end main content -->

				<!-- default modal -->
				<div id="ModalSto" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
						<input type="hidden" id="myModalId"></input>
						<h3 id="myModalLabel">Tambah STO</h3>
					</div>
					<div class="modal-body">
							<form><div class="control-group">
									<label class="control-label" for="inputID">ID STO</label>
									<div class="controls">
										<input type="text" id="inputID" placeholder="ID STO" class="span4" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputNama">Nama STO</label>
									<div class="controls">
										<input type="text" id="inputNama" placeholder="Nama STO" class="span4" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputProvinsi">Provinsi</label>
									<div class="controls">
										<select id="inputProvinsi" class="chzn-select-deselect" data-placeholder="Pilih Provinsi">
											<option></option>
											<?php 
													$get_data1->getProvinsi();
											?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputAlamat">Alamat STO</label>
									<div class="controls">
										<textarea rows="3" id="inputAlamat" class="span5" placeholder="Alamat STO"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputLintang">Garis Lintang</label>
									<div class="controls">
										<input type="text" id="inputLintang" placeholder="Garis Lintang" />
									</div>
									<label class="control-label" for="inputBujur">Garis Bujur</label>
									<div class="controls">
										<input type="text" id="inputBujur" placeholder="Garis Bujur" />
									</div>
								</div>
								<div class="control-group">
									
								</div>
							</form>
						</div>
					<div class="modal-footer">
						<button id="button_simpan" class="btn btn-large btn-success" data-dismiss="modal" aria-hidden="true"><i class="icon-save"></i> Simpan</button>
					</div>
				</div>

				<!-- default modal -->
				<div id="ModalWO" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
						<input type="hidden" id="myModalId"></input>
						<h3 id="myModalLabel">Work Order</h3>
					</div>
					<div class="modal-body">
						okoek
					</div>
				</div>
			
			<!-- sidebar -->
			<ul id="sidebar" class="nav nav-pills nav-stacked">
				<?php require "../nav.php"; ?>
			</ul>
			<!-- end sidebar -->
		</div>
		
		<!-- external api -->
		<script src="http://maps.google.com/maps/api/js?v=3.5&sensor=false&libraries=places"></script>
		
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
		<script src="../library/js/bootstrap-inputmask.min.js"></script>
				
		<!-- plugins loader -->
		<script src="../library/js/loader.js"></script>
		<script src="../library/js/map-places-finder.js"></script>
	</body>
</html>