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
								$result = mysql_query("SELECT * FROM penggunaweb WHERE id_pengguna_web='$id_pengguna'");
								$data=mysql_fetch_array($result);
								
							?>
							<li class="account-info">
								<h3><?php echo $data['username_pengguna_web']; ?></h3>
								<p>
									<b><a><?php echo $data['nama']; ?></a></b> | 
									<a><?php 
										function getHak($hak){
											if ($hak=="super"){$prev="Superadmin";}
											elseif ($hak=="admin") {$prev="Administrator";}
											elseif($hak=="call"){$prev="Call Center";}
											return $prev;
										}
										echo getHak($data['hak_pengguna_web']); ?></a>
								</p>
							</li>
													
							<li class="account-footer">
								<div class="row-fluid">
								
									<div class="span4 align-right">
										<a class="btn btn-small btn-danger btn-flat" href="../?logout=1">Logout</a>
									</div>
									
								</div>									
							</li>
							
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
						<i class="micon-clipboard-2"></i> LOG
					</h2>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li class="text-info">Home</li>
				</ul>
				
				<!-- widget -->
				<div class="well widget" style="margin-bottom: 5px;">
					<!-- widget header -->
					<div class="widget-header">
						<h3 class="title">LOG</h3>
						<div class="widget-nav">
							<div class="nav-item">
								<input type="text" class="datePicker span2" id="datepicker" style="margin-top:3px;" />

								<a href="#">
									<i class="icon-print"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- ./ widget header -->
					
					<!-- widget content -->
					<div class="widget-content">
						<table class="table" >
							<thead>
								<tr>
									<th>Waktu</th>
									<th>Aksi</th>
									<th>Oleh</th>
								</tr>
							</thead>
							<tbody id="getLog">
							</tbody>
						</table>
					</div>
					<!-- ./ widget content -->
				</div>
				<!-- ./ widget -->
				
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
		<script src="../library/js/bootstrap-inputmask.min.js"></script>
		<script src="../library/plugins/bootstrap-datepicker.js"></script>
		<script> 
		    $(document).ready(function(){ 
		    	
		    	var date=new Date();
		    	var tgl=date.getDate();
		    	var bln=date.getMonth()+1;
		    	var thn=date.getFullYear();
		    	var now=bln+"/"+tgl+"/"+thn;
		    	$("#datepicker").val(now);

		    	$("#getLog").load("get_data.php","op=get_log&date="+now);
				$(".datePicker").datepicker()
				.on('changeDate', function(ev){
					    
			    	pick=$("#datepicker").val();
					$("#getLog").load("get_data.php","op=get_log&date="+pick);
				});

		        
		    }); 
		</script> 
		<!-- plugins loader -->
		<script src="../library/js/loader.js"></script>
	</body>
</html>