<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header('Location: http://localhost/swo/');
	}else{
		$username=$_SESSION['username'];
		$id_sto=$_SESSION['id_sto'];
		$id_pengguna=$_SESSION['id_pengguna_web'];
		$hak=$_SESSION['hak'];
	}
	if(isset($_GET['p'])){$limit_start=($_GET['p']);}else{$limit_start="0";};
	include ("connect.php");
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Data Pengguna Device</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Olas Navigator" />

		<!-- required styles -->
		<link href="library/assets/css/adduser-button.css" rel="stylesheet" />
		<link href="library/assets/css/bootstrap-responsive.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<link href="library/css/base.css" rel="stylesheet" />
	
		<script type="text/javascript" src="../library/js/jquery-latest.min.js"></script>
		<script> 
			$(document).ready(function(){ 
				var page=<?php echo $limit_start; ?>;

		    	$("#get_akun").load("get_data.php","op=get_akun&t=device&p="+page);
			    $("#get_pagination").load("get_data.php","op=get_pagination&t=device");
			}); 
		</script>
	</head>
	<body id="body_utama">
			
		
		
		<!-- header -->
		<div id="header" class="navbar">
			<div class="navbar-inner">
				<!-- company or app name -->
				<a class="brand hidden-phone" href="index.html">Smart Work Order</a>
				
				<!-- nav icons -->
				<ul class="nav">
				
					<li class="visible-phone">
						<a href="#"><i class="icon-large icon-search"></i></a>
					</li>
					
				</ul>
				
				<ul class="nav pull-right">
					
					<!-- dropdown user account -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-large icon-user"></i>
						</a>
						
						<ul class="dropdown-menu dropdown-user-account">
							<?php

								include("connect.php");
								include '../akun_nav.php';
							?>
							
						</ul>
					</li>
					<!-- ./ dropdown user account -->
				</ul>
				
				<!-- search form -->
				
				<!-- ./ search form -->
			</div>
		</div>
		<!-- end header -->			
		
		<div id="left_layout">
			<!-- main content -->
			<div id="main_content" class="container-fluid">
			
				<!-- page heading -->
				<div class="page-heading">
				
					<h2 class="page-title muted">
						<i class="icon-table"></i> Data Pengguna Device
					</h2>
					
					<div class="page-info hidden-phone">
						<ul class="stats">
							<li>
								<span class="large">
									<?php
										function hitungJumPenggunaweb(){
											$hitung_pel = mysql_query("SELECT * from penggunadevice");
											$jml_penggunaweb = mysql_num_rows($hitung_pel);
											return $jml_penggunaweb;
										}
										$final_jum_pel = hitungJumPenggunaweb();
										echo $final_jum_pel;
									?>
								</span>
								<span class="mini muted">Total User</span>
							</li>
							<li>
								<span class="large text-info">
									<?php
										function hitungJumPenggunawebSuper(){
											$hitung_pel = mysql_query("SELECT * from penggunaweb WHERE hak_pengguna_web='super'");
											$jml_penggunaweb = mysql_num_rows($hitung_pel);
											return $jml_penggunaweb;
										}
										$final_jum_pel = hitungJumPenggunawebSuper();
										echo $final_jum_pel;
									?>
								</span>
								<span class="mini muted">Super Admin</span>
							</li>
							<li>
								<span class="large text-warning">
									<?php
										function hitungJumPenggunawebAdmin(){
											$hitung_pel = mysql_query("SELECT * from penggunaweb WHERE hak_pengguna_web='admin'");
											$jml_penggunaweb = mysql_num_rows($hitung_pel);
											return $jml_penggunaweb;
										}
										$final_jum_pel = hitungJumPenggunawebAdmin();
										echo $final_jum_pel;
									?>
								</span>
								<span class="mini muted">Administrator</span>
							</li>
							<li>
								<span class="large text-success">
									<?php
										function hitungJumPenggunawebCall(){
											$hitung_pel = mysql_query("SELECT * from penggunaweb WHERE hak_pengguna_web='call'");
											$jml_penggunaweb = mysql_num_rows($hitung_pel);
											return $jml_penggunaweb;
										}
										$final_jum_pel = hitungJumPenggunawebCall();
										echo $final_jum_pel;
									?>
								</span>
								<span class="mini muted">Call Center</span>
							</li>

						</ul>
					</div>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="../">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Akun</li>
				</ul>
				
				<a class="btn btn-cl" href="#myModal3" data-toggle='modal' style="margin-bottom:5px;"><i class="icon-plus"></i> Pengguna Device</a>
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="">
					
					</div>
					<div class="">
						
						<!-- widget -->
						<div class="well widget">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Data Pengguna Device</h3>
								<input type="text" id="searchbyname" name="searchbyname" placeholder="Cari Pengguna Device..." class="span8" style="float:right; margin-top:2px; width:200px;" onKeyup="pilihNama();" />
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table" name="tab_device_user" id="tab_device_user">
									<thead>
										<tr>
											<th>#</th>
											<!-- <th>ID Pengguna Web</th> -->
											<th>Username</th>
											<th>Password</th>
											<th>Nama Team</th>

											<th>Nama STO</th>
											<!-- <th>Nama Area</th> -->

										</tr>
									</thead>
								 
									<tbody id="get_akun">
									
									
									<script>
										function loadXMLDoc(str)
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
											
											}
										  }
										//xmlhttp.open("POST","info.txt",true);
										xmlhttp.open("GET","tables.php?nama="+str,true);
										xmlhttp.send();
										}
										
										function loadUpdateMat()
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
											
											}
										  }
										//var id_penggunaan_material = document.getElementById("updatevalue").innerHTML;
										var id_pengguna_web = document.getElementById("updatevalue").innerHTML;
										//var url = location.href = "http://localhost/Kuta_Admin/update_material.php?id_penggunaan_material="+id_penggunaan_material;
										//xmlhttp.open("POST","info.txt",true);
										var url = location.href = "../akun/update_akun.php?id_pengguna_web="+id_pengguna_web;
										xmlhttp.open("GET","update_akun.php?id_penggunaan_material="+id_penggunaan_material,true);
										xmlhttp.send();
										}
										

										function pilihNama()
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
											document.getElementById("tab_device_user").innerHTML=xmlhttp.responseText;
											
											}
										  }
										
											var value=$('#searchbyname').val();
											xmlhttp.open("GET","../akun/sub_device_user.php?pilihnama="+value,true);
											console.log(value);
											xmlhttp.send();
										}


										function backToDeviceUser()
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
											
											}
										  }
										//var id_penggunaan_material = document.getElementById("updatevalue").innerHTML;
										var id_pengguna_web = document.getElementById("updatevalue").innerHTML;
										//var url = location.href = "http://localhost/Kuta_Admin/update_material.php?id_penggunaan_material="+id_penggunaan_material;
										//xmlhttp.open("POST","info.txt",true);
										var url = location.href = "../akun/device_user.php";
										xmlhttp.open("GET","update_akun.php?id_penggunaan_material="+id_penggunaan_material,true);
										xmlhttp.send();
										}
										

										function setIdValue( id_pengguna_device, username_pengguna_device, password_pengguna_device, id_sto, id_team, id_area){
											
											var id_pengguna = document.getElementById("id_pengguna_device").value=id_pengguna_device;
											var username = $('#username_pengguna_device').val(username_pengguna_device);
											var password = document.getElementById("password_pengguna_device").value=password_pengguna_device;
											var sto = document.getElementById("id_sto2").value=id_sto;	
											var team = $('#id_team2').val(id_team);
											var team = $('#id_area2').val(id_area);
											console.log(tes);
										}

										function setDisable(active_value, id_pengguna_device){
											var url = location.href = "../akun/device_user.php?isactive=zzzd&id_pengguna_device="+id_pengguna_device;
										}
									</script>
										<?php
											
									        if (isset($_GET['isactive'])){$fin_isactive= $_GET['isactive'];}else{$fin_isactive="";}
									        if (isset($_GET['id_pengguna_web'])){$urutan = $_GET['id_pengguna_web'];}else{$urutan ="";}
									        

									        if ($fin_isactive=="zzzd" && $urutan != ""){
									            mysql_query("update penggunaweb set isactive=0 where id_pengguna_web='$urutan';");
									        }
										?>
										
										<!-- JS POST -->
										<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
										<script type="text/javascript">
											
											$(document).ready(
												function(){
													$("#tambahakun").click(
														function(){
															$.post("tambahuvice.php",$("#tambahuviceForm").serialize(),
																function(data){
																	console.log("OKE");

																}
															
															);
															return false;
														}
														
													)
													$("#updateAkun").click(
														function(){
															$.post("updateuvice.php",$("#updateuviceForm").serialize(),
																function(data){
																	console.log("UPDATE OKE");

																}
															
															);
															return false;
														}
														
													)

												}
											);
										
										</script>
										
										<!-- JS POST -->
										
									<!-- default modal -->
									<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Konfirmasi Edit Akun</h3>
										</div>
										<div class="modal-body">
											<p> Edit Akun, ID Pengguna Web :  <p id="updatevalue"></p></p>
										</div>
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
											<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
											<a href="#myModal2" data-toggle="modal" id="sub" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="loadUpdateMat()">Edit</a> 
											
										</div>
									</div>
									<!-- ************ -->
									
									<!-- modal untuk membuat user-->
									<div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Tambah Pengguna Device</h3>
										</div>
										<div class="modal-body">
											<form method="post" action="tambahuvice.php" name="tambahuviceForm" id="tambahuviceForm" class="tambahuviceForm"/>
											<fieldset>


											<label>Username</label>
											<input type="text" class="span8" placeholder="Input Username" name="username" id="username"/>
										
											<label>Password</label>
											<input type="password" class="span8" placeholder="Input Password" name="password" id="password"/>
											
											<label>Confirm Password</label>
											<input type="password" class="span8" placeholder="Input Konfirmasi Password" name="cpassword" id="cpassword"/>
											
											
											<label>Id Team</label>
											<input type="text" class="span8" placeholder="Input Id Team" name="id_team" id="id_team"/>

											<!-- <label>ID STO</label>
											<input type="text" class="span8" placeholder="Input ID STO" name="id_sto" id="id_sto"/> -->
											<?php
												if($hak=="super"){	
													echo "<label>Pilih STO</label>";
													echo "<select class='cselect span8' style='width:200px' data-placeholder='Select category...' name='id_sto' id='id_sto'>";
													echo "<option />";
													$get_nama_sto = mysql_query("select nama_sto, id_sto from sto;");
													while($rows=mysql_fetch_array($get_nama_sto)){
														
														echo "<option selected/>".$rows["nama_sto"];																													
														
														
													}
													echo "</select>";
												}else{
													$get_nama_sto = mysql_query("select nama_sto from sto where id_sto='$id_sto';");
													while($rows=mysql_fetch_array($get_nama_sto)){
														echo "<label>Pilih STO</label>";
														echo "<input type='text' class='span8'  value='$rows[nama_sto]' name='id_sto' id='id_sto' readonly/>";	
													}
												}
											
											?>
											<!-- <label>ID Area</label>
											<input type="text" class="span8" placeholder="Input ID Area" name="id_area" id="id_area"/> -->
												
											<label>&nbsp;</label>
											
											<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
											</fieldset>
								
										</form>	
										</div>
										
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
											<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
											<a href="#myModalAkunBerhasil" data-toggle="modal" id="tambahakun" name="tambahakun" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToDeviceUser()";>Tambahkan</a> 
											
										</div>
									</div>
									<!-- ************ -->

									<!-- Modal Edit User -->
									<div id="myModalEditUser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Konfirmasi Edit Akun</h3>
										</div>
										<div class="modal-body">
										<form method="post" action="updateuvice.php" name="updateuviceForm" id="updateuviceForm"/>
											<fieldset>

												<label>Id Pengguna Device</label>
												<input type="text" class="span8" placeholder="ID Pengguna Device" name="id_pengguna_device" id="id_pengguna_device" value='<?php echo $id_pengguna_device; ?>' readonly/>

												<label>Username</label>
												<input type="text" class="span8" placeholder="Input Username" name="username_pengguna_device" id="username_pengguna_device" value='<?php echo $username_pengguna_device; ?>'/>
												
												
												<label>Password</label>
												<input type="text" class="span8" placeholder="Input Password Pengguna Device" name="password_pengguna_device" id="password_pengguna_device" value='<?php echo $password_pengguna_device; ?>'/>
												

												<!-- <label>Id STO</label>
												<input type="text" class="span8" placeholder="Input ID STO" name="id_sto2" id="id_sto2" value='<? echo $id_sto; ?>'/> -->
											
												<label>Id Team</label>
												<input type="text" class="span8" placeholder="Input Id Team" name="id_team2" id="id_team2"/>												
											
												<?php
												function getSTOFromidPengguna($id_pengguna){

												}
													if($hak=="super"){	
														echo "<label>Pilih STO</label>";
														echo "<select class='cselect span8' style='width:200px' data-placeholder='Select category...' name='id_sto2' id='id_sto2'>";
														echo "<option />";
														$get_nama_sto = mysql_query("select nama_sto from sto;");
														while($rows=mysql_fetch_array($get_nama_sto)){
															echo "<option selected/>".$rows["nama_sto"];														
														}
														echo "</select>";
													}else{
														$get_nama_sto = mysql_query("select nama_sto from sto where id_sto='$id_sto';");
														while($rows=mysql_fetch_array($get_nama_sto)){
															echo "<label>Pilih STO</label>";
															echo "<input type='text' class='span8'  value='$rows[nama_sto]' name='id_sto2' readonly/>";	
													
														}
													}
												
												?>	
												<!-- <label>ID Area</label>
												<input type="text" class="span8" placeholder="Input ID Area" name="id_area2" id="id_area2"/> -->
													
		
												<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
												<div class="widget-content">
												<!-- <a href="#myModal" roll=button id="sub1" class="btn btn-large btn-primary" data-toggle="modal">Edit</a> --> 
													
												</div>
												
											</fieldset>
											
										</form>
										</div>
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
											<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
											<!-- <a href="#myModal2" data-toggle="modal" id="sub" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="loadUpdateMat()">Edit</a> --> 
											<a href="#myModal2" data-toggle="modal" id="updateAkun" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToDeviceUser()";>Edit</a>
										</div>
									</div>

									<!-- ************ -->

									<!-- Modal Berhasil Insert -->
									<div id="myModalAkunBerhasil" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Konfirmasi Pembuatan Akun</h3>
										</div>
										<div class="modal-body">
											<p> Akun Berhasil ditambahkan  </p>
										</div>
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Ok</button>
											<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
											<!-- <a href="#myModal2" data-toggle="modal" id="sub" class="btn btn-primary" aria-hidden="true" data-dismiss="modal">Edit</a> -->
											
										</div>
									</div>
									<!-- ************ -->		

									</tbody>
									
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
			</div>
			<!-- end main content -->
			
			<!-- sidebar -->
			<ul id="sidebar" class="nav nav-pills nav-stacked">
				<?php require "../nav.php"; ?>
			</ul>
			<!-- end sidebar -->
		</div>
		
		<!-- external api -->
		<!-- Loading ke Google Map, Gak usah diaktifkan dulu -->
		
		<!-- <script src="http://maps.google.com/maps/api/js?v=3.5&sensor=false"></script> -->
		
		<!-- base -->
		<script src="library/assets/js/jquery.js"></script>
		<!-- <script src="tambahakun.js"></script> --> 
		<script src="library/assets/js/bootstrap.min.js"></script>
		
		<!-- addons -->
		<script src="library/plugins/chart-plugins.js"></script>
		<script src="library/plugins/jquery-ui-slider.js"></script>
		<script src="library/plugins/redactor/redactor.min.js"></script>
		<script src="library/plugins/jmapping/jquery.metadata.js"></script>
		<script src="library/plugins/jmapping/jquery.jmapping.min.js"></script>
		<script src="library/plugins/jquery.uniform.js"></script>
		<script src="library/plugins/chosen.jquery.min.js"></script>
		<script src="library/plugins/bootstrap-datepicker.js"></script>
		<script src="library/plugins/jquery.timePicker.min.js"></script>
				
		<!-- plugins loader -->
		<script src="library/js/loader.js"></script>
		
	</body>
</html>
