<?php
	session_start();
	include '../session.php';
	require "get_data_langsung.php";
	$get_data=new get_data_langsung();
	if (isset($_GET['idp'])&&isset($_GET['two'])){
		$idp=$_GET['idp'];
		$data_sto=mysql_fetch_array($get_data->getPelanggan_byID($idp));
		$id_sto=$data_sto['id_sto'];
		$two=$_GET['two'];
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
		<style>
			div.growlUI { background: url(../library/check48.png) no-repeat 10px 10px }
			div.growlUI h1, div.growlUI h2 {
			    color: white; padding: 5px 5px 5px 75px; text-align: left
			}
		</style>
		
		<script type="text/javascript" src="../library/js/jquery-latest.min.js"> 
	</script> 
	<script> 
		$(document).ready(function(){ 
			//filter base on status

		    $.blockUI({ css: { 
		            border: 'none', 
		            padding: '15px', 
		            backgroundColor: '#000', 
		            '-webkit-border-radius': '10px', 
		            '-moz-border-radius': '10px', 
		            opacity: .5, 
		            color: '#fff' 
		        } }); 

    		var now=new Date();
    		var tgl=now.getDate();
    		var bln=now.getMonth()+1;
		    var thn=now.getFullYear();
		    var jam=now.getHours();
		    var mnt=now.getMinutes();
    		$("#datepicker").val(tgl+"/"+bln+"/"+thn);
    		$("#timepicker").val(jam+":"+mnt);


		    // $("#get_data").load("get_data.php","op=get_all_assignment");

		    var idp="<?php echo $idp; ?>";
		    var two="<?php echo $two; ?>";
		    var sto="<?php echo $id_sto; ?>";
		    $("#get_data_fo").load("get_data.php","op=get_fo&two="+two+"&sto="+sto);
		    $("#get_one_wo").load("get_data.php","op=get_one_wo&idp="+idp+"&two="+two,$.unblockUI);
		    $("#filterTgl").change(function(){
		    	var tgl=$("#filterTgl").val();
		   		$("#get_data_fo").load("get_data.php","op=get_fo&two="+two+"&sto="+sto+"&tgl_janji="+tgl);
		    });
			
			$("#button_notone").click(function(){
				var ket=$("#inputKeterangan").val();
				var penerima=$("#inputPenerima").val();
				$.ajax({ 
			        url: "store_data.php", 
			        data: "op=notone&idp="+idp+"&two="+two+"&sto="+sto+"&ket="+ket+"&penerima="+penerima, 
			        cache: false, 
			        success: function(){ 
			        	if (two=="instalasi"){
							document.location.href = './';
			        	}else{
							document.location.href = 'migrasi_call.php';
			        	}
		       		} 
		        });
			});
			$("#button_pending").click(function(){
				var ket=$("#inputKeterangan").val();
				var penerima=$("#inputPenerima").val();
				$.ajax({ 
			        url: "store_data.php", 
			        data: "op=pending&idp="+idp+"&two="+two+"&sto="+sto+"&ket="+ket+"&penerima="+penerima, 
			        cache: false, 
			        success: function(){ 
			        	if (two=="instalasi"){
							document.location.href = './';
			        	}else{
							document.location.href = 'migrasi_call.php';
			        	}
		       		} 
		        });
			});
			$("#button_ditolak").click(function(){
				var ket=$("#inputKeterangan").val();
				var penerima=$("#inputPenerima").val();
				$.ajax({ 
			        url: "store_data.php", 
			        data: "op=ditolak&idp="+idp+"&two="+two+"&sto="+sto+"&ket="+ket+"&penerima="+penerima, 
			        cache: false, 
			        success: function(){ 
			        	if (two=="instalasi"){
							document.location.href = './';
			        	}else{
							document.location.href = 'migrasi_call.php';
			        	}
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
					<li class="text-info">Assignment</li>
				</ul>

				
				<!-- post wrapper -->				
				<div class="row-fluid">

					<div class="span8">
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;padding-bottom:0px;">
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table" >
									<!-- load isi table -->
									<tbody id="get_one_wo" class="success"></tbody>

								</table>
							</div>
							<!-- ./ widget content -->
						</div>
					</div>
					<div class="span3">
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;padding-bottom:0px;">
							
							<!-- widget content -->
							<div class="widget-content">
								<div class="control-group">
									<label class="control-label" for="inputKeterangan">Janji :</label>
										<div class="controls">
											<input type="hidden" id="idpelanggan" value="<?php echo $idp; ?>" />
											<input type="text" class="datePicker span6" id="datepicker" />
											<input type="text" class="input-small timePicker span4" id="timepicker" value="12:00" autocomplete="OFF" />
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputKeterangan">Keterangan:</label>
										<div class="controls">
											<textarea rows="2" id="inputKeterangan" class="span12" placeholder="Keterangan" max="200"></textarea>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputKeterangan">Penerima:</label>
										<div class="controls">
											<input type="text" id="inputPenerima" class="span12" placeholder="Penerima" max="20"></input>
										</div>
								</div>
							</div>

							<!-- ./ widget content -->
						</div>
					</div>
					<div class="span1">
							
							<!-- widget content -->
							<div class="widget-content">
								<a id="button_notone" class="btn span12" style="margin-bottom:10px;"><i class="icon-volume-up"></i><br /> NoTone</a>
								<a id="button_pending" class="btn btn-info span12" style="margin-bottom:10px;"><i class="icon-time"></i> Pending</a>
								<a id="button_ditolak" class="btn btn-warning span12"><i class="icon-remove"></i> Ditolak</a>
							</div>
							
					</div>
				</div>
				<!-- ./ post wrapper -->
				
				<!-- post wrapper -->				
				<div class="row-fluid">

					<div class="span12">
						<!-- widget -->
						<div class="well widget" style="margin-bottom: 5px;">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">List Field Ops</h3>
								
								<div class="widget-nav span2" >
									<select id="filterTgl" class="chzn-select-deselect span12" data-placeholder="Semua STO">
										<?php
											$get_data->getTglAssignment();
										?>
									</select>
								</div>
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table table-hover" >
									<!-- load isi table -->
									<tbody id="get_data_fo"></tbody>

								</table>
							</div>
							<!-- ./ widget content -->
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

		<script type="text/javascript" src="../library/js/jquery.blockUI.js"> </script> 
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