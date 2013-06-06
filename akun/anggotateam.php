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
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Data Anggota Team</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Olas Navigator" />

		<!-- required styles -->
		<link href="library/assets/css/adduser-button.css" rel="stylesheet" />
		<link href="library/assets/css/bootstrap-responsive.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<link href="library/css/base.css" rel="stylesheet" />
		

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
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
						<i class="icon-table"></i> Data Anggota Team
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
				
				<div class="pagination" id="tab_pagination">
						<script> 
							function ChangeClass(str,new_pagin)
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
										xmlhttp.open("GET","tables.php?kelas="+str+"&new_pagin="+new_pagin,true);
										document.getElementById(new_pagin).class='active';
										var test = document.getElementById(new_pagin).class;
										
										alert(test);
										xmlhttp.send();
							}
	
						</script>
						
	
						<script>
						</script>
						
						
						<ul>
							
							<?php
														
							//$kelas=$_GET['kelas'];
							//$kelas="a";
							//$new_pagin=$_GET['new_pagin'];
							$new_pagin=1;
							function buatPagination($new_pagin,$kelas){
								$no_pagin=1;
								echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
								while ($no_pagin<5){
									if($new_pagin=="" && $kelas==""){
										echo "<li id='$no_pagin' class='$kelas'><a href='#' onClick=ChangeClass('active',1); >".$no_pagin."</a></li>";
									}else{
										
									}
									$no_pagin=$no_pagin+1;
								}
								echo "<li><a href='#'>&raquo;</a></li>";
							}
							//buatPagination("","");
							?>
							
						</ul>

						
						
				</div>
				<a class="btn btn-cl" href="#myModal3" data-toggle='modal' 	>+ Tambah Anggota Team</a>
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="">
					
					</div>
					<div class="">
						
						<!-- widget -->
						<div class="well widget">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Data Anggota Team</h3>
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table" name="tab_pelanggan" id="tab_pelanggan">
									<thead>
										<tr>
											<th>No</th>
											<!-- <th>ID Pengguna Web</th> -->
											<th>Id Team</th>
											<th>Nama Team</th>
											<th>Nama Anggota</th>
											<th>No HP / Telp </th>
											<th>Jabatan</th>
											<th>Nama STO</th>
											<!-- <th>Nama Area</th> -->

										</tr>
									</thead>
								 
									<tbody>
									
									
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
										
										function backToDeviceUser(id_team, id_sto)
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
										var url = location.href = "../akun/anggotateam.php?id_team="+id_team+"&id_sto="+id_sto;
										xmlhttp.open("GET","update_akun.php?id_penggunaan_material="+id_penggunaan_material,true);
										xmlhttp.send();
										}
										

										function setIdValue(id_anggotateam, nama_anggotateam, no_hp, email){
																						
											$('#id_anggotateam2').val(id_anggotateam);
											$('#nama_anggotateam2').val(nama_anggotateam);
											$('#nohp2').val(no_hp);
											$('#email2').val(email);
											console.log("update anggota");
										}

										function setDisable(active_value, id_anggotateam){
											var url = location.href = "../akun/anggotateam.php?isactive=zzzd&id_anggotateam="+id_anggotateam;
										}
									
									</script>
								
										<?php
										if(isset($_GET['isactive'])){$fin_isactive=$_GET['isactive'];}else{$fin_isactive="";}
									    if(isset($_GET['id_pengguna_device'])){$urutan=$_GET['id_anggotateam'];}else{$urutan="";};
									    if(isset($_GET['id_team'])){$get_id_team=($_GET['id_team']);}else{$get_id_team="";};
									    if(isset($_GET['id_sto'])){$get_id_sto=($_GET['id_sto']);}else{$get_id_sto="";};


										/*if(isset($_GET['isactive'])&&isset($_GET['id_pengguna_device'])&&isset($_GET['id_team'])&&isset($_GET['id_sto'])){
											$fin_isactive= $_GET['isactive'];
											$urutan = $_GET['id_pengguna_device'];
	 										$get_id_team = $_GET['id_team'];
	 										$get_id_sto = $_GET['id_sto'];

										}*/

 										
 										if ($fin_isactive=="zzzd" && $urutan != ""){
 											mysql_query("update anggotateam set isactive=0 where id_anggotateam='$urutan';");
 										}


										$i=1;
										//DI BAGIAN INI DIATUR SESSION UNTUK USER TARUH DI "WHERE"
										if ($hak=="super") {
											$data = mysql_query("select * from anggotateam where isactive=1 AND id_team='$get_id_team';");
										}elseif ($hak=="admin") {
											$data = mysql_query("SELECT * from anggotateam WHERE id_sto='$id_sto' AND id_team='$get_id_team' AND isactive=1;");
										}
										function getHakPenggunaWeb($hak){
											if ($hak=="super"){$prev="Superadmin";}
											elseif ($hak=="admin") {$prev="Administrator";}
											elseif ($hak=="call") {$prev="Call Center";}
											return $prev;
										}


										while ($databaru=mysql_fetch_array($data)){
											$baca_index[$i] = $databaru["id_anggotateam"];											
											echo "<tr class='warning'>";
											//echo "<td>".$databaru[$i]."</td>";
											echo "<td>".$i."</td>";
											//echo "<td>".$databaru[id_pengguna_web]."</td>";
											echo "<td>".$databaru["id_team"]."</td>";

											$pilih_team = mysql_query("select nama_team from team where id_team='$databaru[id_team]'");
											$fin_pilih_team = mysql_fetch_array($pilih_team);											
											echo "<td>".$fin_pilih_team["nama_team"]."</td>";
											
											echo "<td>".$databaru["nama_anggotateam"]."</td>";
											echo "<td>".$databaru["no_telpon"]."</td>";
											echo "<td>".$databaru["jabatan_anggotateam"]."</td>";
											//echo "<td>".$databaru[id_sto]."</td>";



											$pilih_sto = mysql_query("select nama_sto from sto where id_sto='$databaru[id_sto]';");
											$fin_pilih_sto = mysql_fetch_array($pilih_sto);											
											echo "<td>".$fin_pilih_sto["nama_sto"]."</td>";

/*											$pilih_area = mysql_query("select nama_area	from area where id_area='$databaru[id_area]';");
											$fin_pilih_area = mysql_fetch_array($pilih_area);											
											echo "<td>".$fin_pilih_area[nama_area]."</td>";
*/

											echo "<td><a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$databaru[id_anggotateam]','$databaru[nama_anggotateam]','$databaru[no_telpon]','$databaru[email]')>Update</td>";
											echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' onClick=setDisable('zzzd','$databaru[id_anggotateam]');>Disable</td>";
										
											echo "</tr>";
											
											$i++;
											
										}
										//echo "</table>";

										?>
										<!-- JS POST -->
										<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
										<script type="text/javascript">
											
											$(document).ready(
												function(){
													$("#tambahakun").click(
														function(){
															$.post("tambahanggota.php",$("#tambahuviceForm").serialize(),
																function(data){
																	console.log("OKE");

																}
															
															);
															return false;
														}
														
													)
													$("#updateAkun").click(
														function(){
															$.post("updateanggota.php",$("#updateuviceForm").serialize(),
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
											<h3 id="myModalLabel">Tambah Anggota Team</h3>
										</div>
										<div class="modal-body">
											<form method="post" action="tambahanggota.php" name="tambahuviceForm" id="tambahuviceForm" class="tambahuviceForm"/>
											<fieldset>


											<label>Nama Team</label>
											<?php
												$q_get_nama_team = mysql_query("select nama_team from team where id_team = '$get_id_team' ;");
												$ar_get_nama_team = mysql_fetch_array($q_get_nama_team);
												$res_get_nama_team = $ar_get_nama_team[nama_team];

											?>
											<input type="text" class="span8" placeholder="Input Nama Team" name="nama_team" id="nama_team" value = '<?php echo $res_get_nama_team;?>' readonly/>

											<label>Nama Anggota Team</label>
											<input type="text" class="span8" placeholder="Input Nama Anggota" name="nama_anggotateam" id="nama_anggotateam"/>

											<label>No HP</label>
											<input type="text" class="span8" placeholder="Input No HP" name="nohp" id="nohp"/>

											<label>Email</label>
											<input type="text" class="span8" placeholder="Input Email" name="email" id="email"/>
					
											<label>Jabatan</label>
											<select class="span8" name="jabatan" id="jabatan">;
												
												<?php 
												$q_get_anggota = mysql_query("select id_team from anggotateam where id_team='$get_id_team' AND jabatan_anggotateam='Ketua';");
												if (mysql_num_rows($q_get_anggota)>0){
													echo "<option />Anggota";
												}else{
													echo "<option />Ketua";
													echo "<option />Anggota"; 
												}
												?>
											</select>	
											
						
											<?php

													$get_nama_sto = mysql_query("select nama_sto from sto where id_sto='$get_id_sto';");
													while($rows=mysql_fetch_array($get_nama_sto)){
														echo "<label>Pilih STO</label>";
														echo "<input type='text' class='span8'  value='$rows[nama_sto]' name='id_sto' id='id_sto' readonly/>";	
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
											<a href="#myModalAkunBerhasil" data-toggle="modal" id="tambahakun" name="tambahakun" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToDeviceUser('<?php echo $get_id_team; ?>', '<?php echo $get_id_sto; ?>')";>Tambahkan</a> 
											
										</div>
									</div>
									<!-- ************ -->

									<!-- Modal Edit User -->
									<div id="myModalEditUser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Edit Anggota Team</h3>
										</div>
										<div class="modal-body">
										<?
											
										?>
										<form method="post" action="updateanggota.php" name="updateuviceForm" id="updateuviceForm"/>
											<fieldset>


											<label>Nama Team</label>
											<?php
												$q_get_nama_team = mysql_query("select nama_team from team where id_team = '$get_id_team' ;");
												$ar_get_nama_team = mysql_fetch_array($q_get_nama_team);
												$res_get_nama_team = $ar_get_nama_team[nama_team];

											?>
											<input type="text" class="span8" placeholder="Input Nama Team" name="nama_team2" id="nama_team2" value = '<?php echo $res_get_nama_team;?>' readonly/>

											<label>Id Anggota Team</label>
											<input type="text" class="span8" placeholder="Input Id Anggota Team" name="id_anggotateam2" id="id_anggotateam2" readonly/>

											<label>Nama Anggota Team</label>
											<input type="text" class="span8" placeholder="Input Nama Anggota" name="nama_anggotateam2" id="nama_anggotateam2"/>

											<label>No HP</label>
											<input type="text" class="span8" placeholder="Input No HP" name="nohp2" id="nohp2"/>

											<label>Email</label>
											<input type="text" class="span8" placeholder="Input Email" name="email2" id="email2"/>
					
											<label>Jabatan</label>
											<select class="span8" name="jabatan2" id="jabatan2">;
												
												<?php 
												$q_get_anggota = mysql_query("select id_team from anggotateam where id_team='$get_id_team' AND jabatan_anggotateam='Ketua';");
												if (mysql_num_rows($q_get_anggota)>0){
													echo "<option />Anggota";
												}else{
													echo "<option />Ketua";
													echo "<option />Anggota"; 
												}
												?>
											</select>	
											
						
											<?php
												$get_nama_sto = mysql_query("select nama_sto from sto where id_sto='$get_id_sto';");
													while($rows=mysql_fetch_array($get_nama_sto)){
														echo "<label>Pilih STO</label>";
														echo "<input type='text' class='span8'  value='$rows[nama_sto]' name='id_sto2' id='id_sto2' readonly/>";	
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
											<!-- <a href="#myModal2" data-toggle="modal" id="sub" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="loadUpdateMat()">Edit</a> --> 
											<a href="#myModal2" data-toggle="modal" id="updateAkun" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToDeviceUser('<?php echo $get_id_team;?>','<?php echo $get_id_sto;?>')";>Edit</a>
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
		<script src="library/plugins/jmapping/markermanager.js"></script>
		<script src="library/plugins/jmapping/StyledMarker.js"></script>
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
