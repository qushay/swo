
<?php
	session_start();
	include '../session.php';
	require "get_data.php";
	$get_data1=new get_data();
	if (isset($_GET['p'])){
		$page=$_GET['p'];
	}else{
		$page=1;
	}
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
			    $("#get_data").load("get_data.php","op=get_all_pelanggan");
			    $("#get_pagination").load("get_data.php","op=get_pagination");


			    var divre; var sto;var area; var prov;var kab;var kec; var kel; var nama; var alamat;var notel; var datanya;

				
				
				$("#filterSTO").load("get_data.php","op=get_dropdown_sto");
				$("#filterProvinsi").change(function(){
					prov=$("#filterProvinsi").val();
					$("#filterSTO").load("get_data.php","op=get_dropdown_sto&prov="+prov);
				});
				
				$('input').keyup(function(){
					sto = $("#filterSTO").val(); 
			        prov = $("#filterProvinsi").val();
			        nama = $("#filterNama").val(); 
			        dp_lama=$("#filterDPLama").val();
			        jenis_ont=$("#filterJenisONT").val();
			        existing_pots=$("#filterPOTS").val();
				    existing_speedy=$("#filterSpeedy").val();
			        existing_iptv=$("#filterIPTV").val();
			        datanya = "&sto="+sto; 
			        datanya = datanya+"&prov="+prov+"&nama="+nama; 
			        datanya = datanya+"&dp_lama="+dp_lama+"&jenis_ont="+jenis_ont; 
			        datanya = datanya+"&existing_pots="+existing_pots+"&existing_speedy="+existing_speedy+"&existing_iptv="+existing_iptv;

			        console.log(datanya);
			        $("#get_data").load("get_data.php","op=get_all_pelanggan"+datanya); 
				});
				$('select').change(function(){
					sto = $("#filterSTO").val(); 
			        prov = $("#filterProvinsi").val();
			        nama = $("#filterNama").val(); 
			        dp_lama=$("#filterDPLama").val();
			        jenis_ont=$("#filterJenisONT").val();
			        existing_pots=$("#filterPOTS").val();
				    existing_speedy=$("#filterSpeedy").val();
			        existing_iptv=$("#filterIPTV").val();

			        datanya = "&sto="+sto; 
			        datanya = datanya+"&prov="+prov+"&nama="+nama; 
			        datanya = datanya+"&dp_lama="+dp_lama+"&jenis_ont="+jenis_ont; 
			        datanya = datanya+"&existing_pots="+existing_pots+"&existing_speedy="+existing_speedy+"&existing_iptv="+existing_iptv;

			        console.log(datanya);
			        $("#get_data").load("get_data.php","op=get_all_pelanggan"+datanya); 
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
				<a class="brand hidden-phone" href="index.html">Smart Work Order</a>
				
				
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
						<i class="icon-table"></i> Semua Pelanggan
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
					<li><a href="index.php">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="#">Pelanggan</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Semua</li>
				</ul>

				
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span2">
						
						<!-- widget -->
						<div class="well widget">
							<div class="widget-header">
								<h3 class="title">Filter / Cari</h3>
							</div>
							<form class="form-horizontal" />
								<input id="filterNama" type="text" placeholder="Nama" class="span12" />
								
								<div class="widget-nav" style="margin-top:10px">
									<?php 
										if ($hak=="super"){
											echo '<select id="filterProvinsi" class="chzn-select-deselect span12" data-placeholder="Pilih Provinsi">';
												$get_data1->getProvinsi();
										}else{
											echo '<select id="filterProvinsi" class="chzn-select-deselect span12" data-placeholder="Pilih Provinsi" disabled>';
												$get_data1->getProvinsi_bySTO($id_sto);	
										}
										echo '</select>';
									?>
								</div>
								<div class="widget-nav" style="margin-top:10px" >
									<?php
									if ($hak=="super"){
							            echo '<select id="filterSTO" class="span12" data-placeholder="Pilih STO">';
							        }else{
							            echo '<select id="filterSTO" class="span12" data-placeholder="Pilih STO" disabled>';
							        }
							        echo '</select>';
							        ?>
																
								</div>
								<div class="widget-nav" style="margin-top:10px">
									<select id="filterDPLama" class="chzn-select-deselect span12" data-placeholder="Pilih DP Lama">
										<?php 
											$get_data1->getDPLama_all();
										?>
									</select>
								</div>
								<div class="widget-nav" style="margin-top:10px">
									<select id="filterJenisONT" class="chzn-select-deselect span12" data-placeholder="Pilih Jenis ONT">
												<?php 
													$get_data1->getJenisONT_all();
												?>
									</select>
								</div>

								<input id="filterPOTS" type="text" placeholder="Nomor POTS" class="span12" style="margin-top:10px" />

								<input id="filterSpeedy" type="text" placeholder="Nomor Speedy" class="span12" style="margin-top:10px" />

								<input id="filterIPTV" type="text" placeholder="Nomor IPTV" class="span12" style="margin-top:10px" />
							</form>
						</div>
						<!-- ./ widget -->
						
					</div>
					<div class="span10">
						<img src="../library/images/loader.gif" id="loading" style="display:none"> 
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">List Pelanggan</h3>
								
								<div class="widget-nav">
									<div class="nav-item">
										<a href="#">
											<i class="micon-file-excel"></i>
										</a>
										<a href="#">
											<i class="icon-print"></i>
										</a>
									</div>
								</div>
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table  table-condensed table-hover" >
									<thead>
										<tr>
											<th>#</th>
											<th>ID</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Nomer</th>
											<th>Kelurahan</th>
											<th>Kecamatan</th>
											<th>Kabupaten</th>
											<th>Kode Pos</th>
											<th>Jml Line</th>
										</tr>
									</thead>
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

				<!-- default modal -->
				<div id="ModalJmlLine" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div id="getLinePelanggan"></div>
					
				</div>
				<!-- / default modal -->

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