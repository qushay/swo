<?php
	session_start();
	include("../session.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Update Material</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Olas Navigator" />

		<!-- required styles -->
		<link href="library/assets/css/update_material.css" rel="stylesheet" />
		<link href="library/assets/css/update_material-responsive.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		<!-- header -->
		<div id="header" class="navbar">
			<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
			<script>
									function backToTampilPmaterial()
										{
										var xmlhttp;
										if (window.XMLHttpRequest)
										  {// code for IE7+, Firefox, Chrome, Opera, Safari
										  xmlhttp=new XMLHttpRequest();
										  }
										else
										  {// code for IE6, IE5
										  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										  }
										xmlhttp.onreadystatechange=function()
										  {
										  if (xmlhttp.readyState==4 && xmlhttp.status==200)
											{
											document.getElementById("body_utama").innerHTML=xmlhttp.responseText;
											//alert(str);
											}
										  }
										//xmlhttp.open("POST","info.txt",true);
										//xmlhttp.open("GET","tables.php?kelas="+str+"&new_pagin="+new_pagin,true);
										//document.getElementById(new_pagin).class='active';
										//var test = document.getElementById(new_pagin).class;
										
										//alert(test);
										var url = location.href = "../akun_material/tampil_pmaterial.php";
										
										xmlhttp.send();
									}

									function backToUpdateMaterial(id_penggunaan_material)
										{
										var xmlhttp;
										if (window.XMLHttpRequest)
										  {// code for IE7+, Firefox, Chrome, Opera, Safari
										  xmlhttp=new XMLHttpRequest();
										  }
										else
										  {// code for IE6, IE5
										  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										  }
										xmlhttp.onreadystatechange=function()
										  {
										  if (xmlhttp.readyState==4 && xmlhttp.status==200)
											{
											document.getElementById("body_utama").innerHTML=xmlhttp.responseText;
											//alert(str);
											}
										  }
										//xmlhttp.open("POST","info.txt",true);
										//xmlhttp.open("GET","tables.php?kelas="+str+"&new_pagin="+new_pagin,true);
										//document.getElementById(new_pagin).class='active';
										//var test = document.getElementById(new_pagin).class;
										
										//alert(test);
										var url = location.href = "../material/update_material.php?id_penggunaan_material="+id_penggunaan_material;
										
										xmlhttp.send();
									}
			</script>
			<div class="navbar-inner">
				<!-- company or app name -->
				<a class="brand hidden-phone" href="index.html">Smart Work Order</a>
				
				<!-- nav icons -->
				
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
						<i class="icon-th-large"></i>Detail Penggunaan Material
					</h2>
					
					<div class="page-info hidden-phone">
						<?php 
							include("../connect.php");
							
							$id_penggunaan_material = $_GET['id_penggunaan_material'];
							$q_team_header = mysql_query("select id_team from penggunaanmaterial where id_penggunaan_material='$id_penggunaan_material';");
							while($ar_team_header = mysql_fetch_array($q_team_header)){
								
								$id_team_header = $ar_team_header["id_team"];
								$q_get_nama_team = mysql_query("select nama_team from team where id_team='$id_team_header';");
								$ar_get_nama_team = mysql_fetch_array($q_get_nama_team);
								$get_nama_team= $ar_get_nama_team["nama_team"];
							}
						?>
						<ul class="stats">
							<li>
								<span class="large text-warning"><?php echo $id_team_header ;?></span>
								<span class="mini muted">Id Team</span>
							</li>
							<li>
								<span class="large text-warning"><?php echo $get_nama_team ;?></span>
								<span class="mini muted">Nama Team</span>
							</li>
							
						</ul>

					</div>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="#">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="../material/tampil_pmaterial.php">Material</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Detail Material</li>
					
				</ul>
				
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span7">										
						
						<div class="well widget">
							
							
							<div class="widget-header">
								<h3 class="title">Pengambilan Material</h3>
							</div>
							<!-- Total Material yang pernah diambil 
								 Akumulasi Pengambilan Material
							-->
						
							<?	
								$query = mysql_query("select * from pengambilanmaterial where id_penggunaan_material='$id_penggunaan_material';");
								while($row = mysql_fetch_array($query)){
									$id_team = $row["id_team"];
									$jumlah_ont = $row["jumlah_ont"];
									$sn_ont = $row["sn_ont"];
									$jumlah_roset = $row["jumlah_roset"];
									$kabel_50 = $row["kabel_50"];
									$kabel_75 = $row["kabel_75"];
									$kabel_100 = $row["kabel_100"];
									$jumlah_duct = $row["jumlah_duct"];
									$jumlah_flexible_pipe = $row["jumlah_flexible_pipe"];
									$tgl_ambil = $row["tgl_ambil"];
									
								}
							?>
							<form method="post" action="updatemat.php" name="insertmatForm" id="insertmatForm"/>
								<fieldset>
									
									
									<label>Nama Team</label>
									<?php
										$ar_nama_team = mysql_query("select nama_team from team where id_team='$id_team'");
										$temp_ar = mysql_fetch_array($ar_nama_team);
										$nama_team = $temp_ar["nama_team"];
									?>
									<input type="text" class="span8" placeholder="Input Id Team" name="id_team" id="id_team" value='<?php echo $nama_team; ?>' readonly/>
									
											
									<label>Jumlah ONT</label>
									<input type="text" class="span8" placeholder="Input Jumlah ONT" name="jml_ont" id="jml_ont" value='<? echo $jumlah_ont; ?>' readonly />
									
										
									
<!-- 									<label>Serial Number ONT</label>
									<input type="text" class="span8" placeholder="Input Serial Number ONT" name="sn_ont" id="sn_ont" value='<? echo $sn_ont; ?>' readonly/>
									<hr /> -->
									
									<label>Jumlah Roset</label>
									<input type="text" class="span8" placeholder="Input Jumlah Roset" name="jml_roset" id="jml_roset" value='<? echo $jumlah_roset; ?>' readonly />
									

										
									<label>Kabel 50</label>
									<input type="text" class="span8" placeholder="Input Kabel 50" name="kabel_50" id="kabel_50" value='<? echo $kabel_50; ?>' readonly/>
									
									<label>Kabel 75</label>
									<input type="text" class="span8" placeholder="Input Kabel 75" name="kabel_75" id="kabel_75" value='<? echo $kabel_75; ?>' readonly/>
									
									<label>Kabel 100</label>
									<input type="text" class="span8" placeholder="Input Kabel 100" name="kabel_100" id="kabel_100" value='<? echo $kabel_100; ?>' readonly/>											
									

									<label>Jumlah Duct</label>
									<input type="text" class="span8" placeholder="Input Jumlah Duct" name="jml_duct" id="jml_duct" value='<? echo $jumlah_duct; ?>' readonly />
									
									
									<label>Jumlah Flexible Pipe</label>
									<input type="text" class="span8" placeholder="Input Jumlah Flexible Pipe" name="jml_flex_pipe" id="jml_flex_pipe" value='<? echo $jumlah_flexible_pipe; ?>' readonly />


									
									<label>&nbsp;</label>
								</fieldset>
								
							</form>
							
							
							<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
							<script type="text/javascript" src="updatemat.js"></script>
						</div>
					</div>
					
					<!-- span72 atas -->
					<div class="span7">										
						
						<div class="well widget">
							
							
							<div class="widget-header">
								<h3 class="title">Pemakaian Material</h3>
							</div>
							
							<!-- Total Akumulasi Pemakaian Material 
							Yang dikirim dari Android
							-->

							<?php	//$id_penggunaan_material = $_GET['id_penggunaan material'];
								
								$id_penggunaan_material = $_GET['id_penggunaan_material'];
								$queryterpakai = mysql_query("select * from materialterpakai where id_team='$id_team';");
								
								while($row = mysql_fetch_array($queryterpakai)){
									$id_team2 = $row["id_team"];
									$jumlah_ont2 = $row["jumlah_ont"];
									$sn_ont2 = $row["sn_ont"];
									$jumlah_roset2 = $row["jumlah_roset"];
									$kabel_502 = $row["kabel_50"];
									$kabel_752 = $row["kabel_75"];
									$kabel_1002 = $row["kabel_100"];
									$jumlah_duct2 = $row["jumlah_duct"];
									$jumlah_flexible_pipe2 = $row["jumlah_flexible_pipe"];
									$tgl_ambil2 = $row["tgl_ambil"];
									
								}
								
								
							?>
							<form method="post" action="updatemat.php" name="insertmatForm2" id="insertmatForm2"/>
								<fieldset>
									
									
									<label>Nama Team</label>
									<input type="text" class="span8" placeholder="Input Id Team" name="id_team" id="id_team" value='<? echo $nama_team; ?>' readonly />
									
											
									<label>Jumlah ONT</label>
									<input type="text" class="span8" placeholder="Input Jumlah ONT" name="jml_ont" id="jml_ont" value='<? echo $jumlah_ont2; ?>' readonly />
									
										
									
									<!-- <label>Serial Number ONT</label>
									<input type="text" class="span8" placeholder="Input Serial Number ONT" name="sn_ont" id="sn_ont" value='<? echo $sn_ont2; ?>' readonly />
									<hr /> -->
									
									<label>Jumlah Roset</label>
									<input type="text" class="span8" placeholder="Input Jumlah Roset" name="jml_roset" id="jml_roset" value='<? echo $jumlah_roset2; ?>' readonly />
									

									<label>Kabel 50</label>
									<input type="text" class="span8" placeholder="Input Kabel 50" name="kabel_502" id="kabel_502" value='<? echo $kabel_502; ?>' readonly/>
									
									<label>Kabel 75</label>
									<input type="text" class="span8" placeholder="Input Kabel 75" name="kabel_752" id="kabel_752" value='<? echo $kabel_752; ?>' readonly/>
									
									<label>Kabel 100</label>
									<input type="text" class="span8" placeholder="Input Kabel 100" name="kabel_1002" id="kabel_1002" value='<? echo $kabel_1002; ?>' readonly/>
									
									<label>Jumlah Duct</label>
									<input type="text" class="span8" placeholder="Input Jumlah Duct" name="jml_duct" id="jml_duct" value='<? echo $jumlah_duct2; ?>' readonly />
									
									
									<label>Jumlah Flexible Pipe</label>
									<input type="text" class="span8" placeholder="Input Jumlah Flexible Pipe" name="jml_flex_pipe" id="jml_flex_pipe" value='<? echo $jumlah_flexible_pipe2; ?>' readonly />
									
									
									<label>&nbsp;</label>

								</fieldset>
								
							</form>
							
							
							<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
							<script type="text/javascript" src="updatemat.js"></script>
						</div>
						
					</div>
					
					
					<!-- span72 bawah -->
					
					<!-- span73 atas -->
					<div class="span7">										
						
						<div class="well widget">
							
							<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
										<script type="text/javascript">
											
											$(document).ready(
												function(){
													$("#kembalikan").click(
														function(){
															$.post("matkembali.php",$("#formkembali").serialize(),
																function(data){
																	console.log("TES");
																	//if($("#id_sto").val()==""){
																		//alert("Maaf ID STO Masih Kosong");
																	//}

																}
															
															);
															return false;
														}
														
													)
												}
											);
										
							</script>
										
							<!-- JS POST -->
							
							<div class="widget-header">
								<h3 class="title">Sisa Material Pada Team</h3>
							</div>

							<!-- 
								Selisih Antara Akumulasi Pengambilan Material dengan Akumulasi Pemakaian Material
							-->						
							<?	//$id_penggunaan_material = $_GET['id_penggunaan material'];
								
								$id_penggunaan_material = $_GET['id_penggunaan_material'];
								$query = mysql_query("select * from penggunaanmaterial where id_team='$id_team';");
								
								while($row = mysql_fetch_array($query)){
									$id_team3 = $row["id_team"];
									$jumlah_ont3 = $row["jumlah_ont"];
									$sn_ont3 = $row["sn_ont"];
									$jumlah_roset3 = $row["jumlah_roset"];
									$kabel_503 = $row["kabel_50"];
									$kabel_753 = $row["kabel_75"];
									$kabel_1003 = $row["kabel_100"];
									$jumlah_duct3 = $row["jumlah_duct"];
									$jumlah_flexible_pipe3 = $row["jumlah_flexible_pipe"];
									$tgl_ambil3 = $row["tgl_ambil"];
									
								}
								
								
							?>
							<form method="post" action="updatemat.php" name="insertmatForm3" id="insertmatForm3"/>
								<fieldset>
									
									
									<label>Id Team</label>
									<input type="text" class="span8" placeholder="Input Id Team" name="id_team" id="id_team" value='<? echo $id_team3; ?>' readonly/>
									
											
									<label>Jumlah ONT</label>
									<input type="text" class="span8" placeholder="Input Jumlah ONT" name="jml_ont" id="jml_ont" value='<? echo $jumlah_ont3; ?>' readonly/>
									
										
									
<!-- 									<label>Serial Number ONT</label>
									<input type="text" class="span8" placeholder="Input Serial Number ONT" name="sn_ont" id="sn_ont" value='<? echo $sn_ont; ?>' readonly/>
									<hr /> -->
									
									<label>Jumlah Roset</label>
									<input type="text" class="span8" placeholder="Input Jumlah Roset" name="jml_roset" id="jml_roset" value='<? echo $jumlah_roset3; ?>' readonly/>
									

									<label>Kabel 50</label>
									<input type="text" class="span8" placeholder="Input Kabel 50" name="kabel_50" id="kabel_50" value='<? echo $kabel_503; ?>' readonly/>
									
									<label>Kabel 75</label>
									<input type="text" class="span8" placeholder="Input Kabel 75" name="kabel_75" id="kabel_75" value='<? echo $kabel_753; ?>' readonly/>
									
									<label>Kabel 100</label>
									<input type="text" class="span8" placeholder="Input Kabel 100" name="kabel_100" id="kabel_100" value='<? echo $kabel_1003; ?>' readonly/>									
									
									<label>Jumlah Duct</label>
									<input type="text" class="span8" placeholder="Input Jumlah Duct" name="jml_duct" id="jml_duct" value='<? echo $jumlah_duct3; ?>' readonly/>
									
									
									<label>Jumlah Flexible Pipe</label>
									<input type="text" class="span8" placeholder="Input Jumlah Flexible Pipe" name="jml_flex_pipe" id="jml_flex_pipe" value='<? echo $jumlah_flexible_pipe-$jumlah_flexible_pipe2; ?>' readonly/>
									

									
									<label>&nbsp;</label>
									
									<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
									
 									
	 									</fieldset>
									</form>
	
									<div class="widget-content">
									<a href="#myModal" roll=button id="sub1" class="btn btn-large btn-primary" data-toggle="modal">Retur</a> 
										
									</div>
									
 						
						
						
									<!-- default modal -->
									<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Pengembalian Material</h3>
										</div>
										<div class="modal-body">
											<form method="post" action="matkembali.php" name="formkembali" id="formkembali"/>
												<fieldset>
													
													
													<label>Id Team</label>
													<input type="text" class="span8" placeholder="Input Id Team" name="id_teamr" id="id_teamr" value='<? echo $id_team; ?>' readonly/>
													<hr />
															
													<label>Jumlah ONT</label>
													<input type="text" class="span8" placeholder="Input Jumlah ONT" name="jml_ontr" id="jml_ontr" value='<? echo $jumlah_ont-$jumlah_ont2; ?>' />
													<hr />
														
													
													<!-- <label>Serial Number ONT</label>
													<input type="text" class="span8" placeholder="Input Serial Number ONT" name="sn_ontr" id="sn_ontr" value='<? echo $sn_ont; ?>' />
													<hr /> -->
													
													<label>Jumlah Roset</label>
													<input type="text" class="span8" placeholder="Input Jumlah Roset" name="jml_rosetr" id="jml_rosetr" value='<? echo $jumlah_roset-$jumlah_roset2; ?>' />
													<hr />

													<label>Kabel 50</label>
													<input type="text" class="span8" placeholder="Input Kabel 50" name="kabel_50r" id="kabel_50r" value='<? echo $kabel_503; ?>' />
													<hr />
													<label>Kabel 75</label>
													<input type="text" class="span8" placeholder="Input Kabel 75" name="kabel_75r" id="kabel_75r" value='<? echo $kabel_753; ?>' />
													<hr />
													<label>Kabel 100</label>
													<input type="text" class="span8" placeholder="Input Kabel 100" name="kabel_100r" id="kabel_100r" value='<? echo $kabel_1003; ?>' />									
													<hr />
													
													<label>Jumlah Duct</label>
													<input type="text" class="span8" placeholder="Input Jumlah Duct" name="jml_ductr" id="jml_ductr" value='<? echo $jumlah_duct3; ?>' />
													<hr />
													
													<label>Jumlah Flexible Pipe</label>
													<input type="text" class="span8" placeholder="Input Jumlah Flexible Pipe" name="jml_flex_piper" id="jml_flex_piper" value='<? echo $jumlah_flexible_pipe-$jumlah_flexible_pipe2; ?>' />
												</fieldset>
											</form>
										</div>
										<div class="modal-footer">
										
											<!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Back</button> -->
											<!-- <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="">Input</button> -->								
											<a href="#" data-toggle="modal" id="kembalikan" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToUpdateMaterial('<? echo $id_penggunaan_material; ?>');">Kembalikan</a>
											
										</div>
									</div>
									<!-- ************ -->
								
									<!-- default modal -->
									<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Pengembalian Material</h3>
										</div>
										<div class="modal-body">
											<p> Data berhasil di-inputkan...</p>
										</div>
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Ok</button>
											<!-- <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="">Input</button> -->							
											
										</div>
									</div>
								<!-- ************ -->
								
							
							
							<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
							
							<!-- <script type="text/javascript" src="updatemat.js"></script> -->
						</div>
						
					</div>
					
					
					<!-- span73 bawah -->
					
					
					
					<div class="span5">
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
		
		<!-- external api -->
		<!--<script src="http://maps.google.com/maps/api/js?v=3.5&sensor=false"></script> -->
		
		<!-- base -->
		<script src="library/assets/js/jquery.js"></script>
		<script src="library/assets/js/bootstrap.min.js"></script>
		
		<!-- addons -->
		<script src="library/plugins/chart-plugins.js"></script>
		<script src="library/plugins/jquery-ui-slider.js"></script>
		<script src="library/plugins/redactor/redactor.min.js"></script>
		<script src="library/plugins/jmapping/markermanager.js"></script>
		<script src="library/plugins/jmapping/StyledMarker.js"></script>
		<script src="library/plugins/jmapping/jquery.metadata.js"></script>
		<script src="library/plugins/jmapping/jquery.jmapping.min.js"></script>
		<script src="library/plugins/jquery.uniform.js"></script>
		<script src="library/plugins/chosen.jquery.min.js"></script>
		<script src="library/plugins/bootstrap-datepicker.js"></script>
		<script src="library/plugins/jquery.timePicker.min.js"></script>
		<script src="scriptku.js"></script>
		<script src="library/js/jquery-1.8.3.min.js" type="text/javascript"></script>		
		<!-- plugins loader -->
		<script src="library/js/loader.js"></script>
	</body>
</html>