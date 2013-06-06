<html>
	<head>
		<meta charset="utf-8" />
		<title>Data Pengguna Web</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Olas Navigator" />

		<!-- required styles -->
		<link href="library/assets/css/adduser-button.css" rel="stylesheet" />
		<link href="library/assets/css/bootstrap-responsive.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<link href="library/css/base.css" rel="stylesheet" />
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body id="body_utama">
		<?
		/*mysql_connect("localhost","root","yastahaa");
		mysql_select_db("swo");
		*/
		include("connect.php");
		
		?>			
		
		
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
						
							<li class="account-img-container">
								<img class="thumb account-img" src="library/images/100/07.png" />
							</li>
							
							<li class="account-info">
								<h3>Geunevere Calista</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<p>
									<a href="#">Edit</a> | <a href="#">Account Settings</a>
								</p>
							</li>
							
							<li class="account-footer">
								<div class="row-fluid">
								
									<div class="span8">
										<a class="btn btn-small btn-primary btn-flat" href="#">Change avatar</a>
									</div>
									
									<div class="span4 align-right">
										<a class="btn btn-small btn-danger btn-flat" href="#">Logout</a>
									</div>
									
								</div>									
							</li>
							
						</ul>
					</li>
					<!-- ./ dropdown user account -->
				</ul>
				
				<!-- search form -->
				<form class="navbar-search pull-right hidden-phone" action="" />
					<input type="text" class="search-query span4" placeholder="search..." />
				</form>
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
						<i class="icon-table"></i> Data Pengguna Web
					</h2>
					
					<div class="page-info hidden-phone">
						<ul class="stats">
							<li>
								<span class="large text-warning">
								
								
								<?
								function hitungJumPenggunaweb(){
									$hitung_pel = mysql_query("select * from penggunaweb");
									$jml_penggunaweb = mysql_num_rows($hitung_pel);
									return $jml_penggunaweb;
								}
								$final_jum_pel = hitungJumPenggunaweb();
								echo $final_jum_pel;
								
								?>

								</span>
								<span class="mini muted">User</span>
							</li>
							<li>
								<span class="large text-info">4523</span>
								<span class="mini muted">members</span>
							</li>

						</ul>
					</div>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="#">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="#">User Interface</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Tables</li>
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
							
							<?
														
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
							buatPagination("","");
							?>
							
						</ul>

						
						
				</div>
				<a class="btn btn-cl" href="#myModal3" data-toggle='modal' 	>+ Add User</a>
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="">
					
						

						
					</div>
					<div class="">
						
						<!-- widget -->
						<div class="well widget">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Data Pengguna Web</h3>
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table" name="tab_pelanggan" id="tab_pelanggan">
									<thead>
										<tr>
											<th>No</th>
											<th>ID Pengguna Web</th>
											<th>Username</th>
											<th>Password</th>
											<th>ID STO</th>
											<th>Hak Pengguna Web</th>
											<th>Pembuat Pengguna Web</th>
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
										var url = location.href = "../akun_material/update_akun.php?id_pengguna_web="+id_pengguna_web;
										xmlhttp.open("GET","update_akun.php?id_penggunaan_material="+id_penggunaan_material,true);
										xmlhttp.send();
										}
										
										function backToTampilUser()
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
										var url = location.href = "../akun_material/tampil_user.php";
										xmlhttp.open("GET","update_akun.php?id_penggunaan_material="+id_penggunaan_material,true);
										xmlhttp.send();
										}
										
										function setIdValue(id_pengguna_web, username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web){
											
											var username = $('#username_pengguna_web').val(username_pengguna_web);
											//document.getElementById("username_pengguna_web").value=username_pengguna_web;
											var password = document.getElementById("password_pengguna_web").value=password_pengguna_web;
											var id_pengguna = document.getElementById("id_pengguna_web").value=id_pengguna_web;
											var sto = document.getElementById("id_sto2").value=id_sto;
											
											var hak = $("#hak_pengguna_web").val(hak_pengguna_web);
											tes = $("#hak_pengguna_web").val();
											console.log(tes);
										}
									
									</script>
								
										<?
										$i=1;
 
										//GET dari jquery
										$nama=$_GET['nama'];
										if($nama !=""){
											//$data = $getdata->getDataPelanggan("select * from pelanggan where nama_pelanggan='$nama';");
											$data = mysql_query("select * from penggunaweb where nama_pelanggan='$nama';");
										}else{
											//$data = $getdata->getDataPelanggan("select * from penggunaanmaterial;");
											$data = mysql_query("select * from penggunaweb;");
										}	
										//echo "<table name='tab_pelanggan' id='tab_pelanggan'>";
										while ($databaru=mysql_fetch_array($data)){
											$baca_index[$i] = $databaru[id_pengguna_web];											
											echo "<tr class='warning'>";
											//echo "<td>".$databaru[$i]."</td>";
											echo "<td>".$i."</td>";
											echo "<td>".$databaru[id_pengguna_web]."</td>";
											echo "<td>".$databaru[username_pengguna_web]."</td>";
											echo "<td>".$databaru[password_pengguna_web]."</td>";
											echo "<td>".$databaru[id_sto]."</td>";
											echo "<td>".$databaru[hak_pengguna_web]."</td>";
											echo "<td>".$databaru[pembuat_pengguna_web]."</td>";

											
											echo "<td><a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[username_pengguna_web]','$databaru[password_pengguna_web]','$databaru[id_sto]','$databaru[hak_pengguna_web]')>Update</td>";
											echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' onClick=alert('$baca_index[$i]'+'kanan');>Hapus</td>";
											
											//echo "<td><button class='icon-arrow-right' onClick=alert('$baca_index[$i]'+'kanan');></td>";
											//Mengubah Content tabel
											//echo "<td><button class='icon-ok' id='filter' onClick=loadXMLDoc('Danu');></i></td>";
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
															$.post("insertmat.php",$("#tambahakunForm").serialize(),
																function(data){
																	if($("#id_sto").val()==""){
																		//alert("Maaf ID STO Masih Kosong");
																	}

																}
															
															);
															return false;
														}
														
													)
													$("#updateAkun").click(
														function(){
															$.post("updateak.php",$("#updatematForm").serialize(),
																function(data){
																	if($("#id_sto").val()==""){
																		//alert("Maaf ID STO Masih Kosong");
																	}

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
											<h3 id="myModalLabel">Membuat Akun Pengguna Baru</h3>
										</div>
										<div class="modal-body">
											<form method="post" action="tambahakun.php" name="tambahakunForm" id="tambahakunForm" class="tambahakunForm"/>
											<fieldset>
											
											<label>Username</label>
											<input type="text" class="span8" placeholder="Input Id Team" name="username" id="username"/>
										
											<label>Password</label>
											<input type="password" class="span8" placeholder="Input Password" name="password" id="password"/>
											
											<label>Confirm Password</label>
											<input type="password" class="span8" placeholder="Input Konfirmasi Password" name="cpassword" id="cpassword"/>
																						<label>ID STO</label>
											<input type="text" class="span8" placeholder="Input ID STO" name="id_sto" id="id_sto"/>
											
											<!-- <label>Hak Pengguna Web</label>
											<input type="text" class="span8" placeholder="Input Hak Pengguna Web" name="hak_pengguna_web" id="hak_pengguna_web"/> -->
											
											<label>Hak Pengguna Web</label>
												
												<select class="span8" name="hak_pengguna_web_tambah" id="hak_pengguna_web_tambah">
													<option />super
													<option />admin
													<option />call
												</select>
														<label>&nbsp;</label>
											
											<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
											</fieldset>
								
										</form>	
										</div>
										
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
											<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
											<a href="#myModalAkunBerhasil" data-toggle="modal" id="tambahakun" name="tambahakun" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToTampilUser()";>Tambahkan</a> 
											
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
										<?
											
										?>
										<form method="post" action="updateak.php" name="updatematForm" id="updatematForm"/>
											<fieldset>
												
												
												<label>Id Pengguna Web</label>
												<input type="text" class="span8" placeholder="Input Id Pengguna Web" name="id_pengguna_web" id="id_pengguna_web" value='<? echo $id_pengguna_web; ?>' />
											
														
												<label>Username</label>
												<input type="text" class="span8" placeholder="Input Username" name="username_pengguna_web" id="username_pengguna_web" value='<? echo $username_pengguna_web; ?>'/>
												
												
												<label>Password</label>
												<input type="text" class="span8" placeholder="Input Password Pengguna Web" name="password_pengguna_web" id="password_pengguna_web" value='<? echo $password_pengguna_web; ?>'/>
												
												
												<label>Id STO</label>
												<input type="text" class="span8" placeholder="Input ID STO" name="id_sto2" id="id_sto2" value='<? echo $id_sto; ?>'/>
												
												
												<label>Hak Pengguna Web</label>
												<select class="span8" name="hak_pengguna_web" id="hak_pengguna_web">
													<option value="super"/>super
													<option value="call"/>call
													<option value="admin"/>admin
												</select>
													
															
												<!-- <label>Hak Pengguna Web</label>
												<input type="text" class="span8" placeholder="Input Hak Pengguna Web" name="hak_pengguna_web" id="hak_pengguna_web" value='<? echo $hak_pengguna_web; ?>'/>
												<hr />
												-->
												<!--
												<label>Pembuat Pengguna Web</label>
												<input type="text" class="span8" placeholder="Input Pembuat Pengguna Web" name="pembuat_pengguna_web" id="pembuat_pengguna_web" value='<? echo $pembuat_pengguna_web; ?>'/>
												<hr />
												-->

												
												<label>&nbsp;</label>
												
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
											<a href="#myModal2" data-toggle="modal" id="updateAkun" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToTampilUser()";>Edit</a>
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
										<?

										?>
										

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
				<li class="avatar hidden-phone">
					<a href="#">
						<img src="library/images/100/06.png" />
						<span>Geunevere Calista</span>
					</a>
				</li>
				<li>
					<a href="index.html">
						<i class="micon-screen"></i>
						<span class="hidden-phone">Dashboard</span>
					</a>
				</li>
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="micon-gift"></i>
						<span class="hidden-phone">UI</span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="typography.html">
								<i class="icon-large icon-underline"></i> Typography
							</a>
						</li>
						<li class="active">
							<a href="tables.html">
								<i class="icon-large icon-table"></i> Tables
							</a>
						</li>
						<li>
							<a href="buttons.html">
								<i class="icon-large icon-th"></i> Buttons
							</a>
						</li>
						<li>
							<a href="icons.html">
								<i class="icon-large icon-check-empty"></i> Icons
							</a>
						</li>
						<li>
							<a href="dropdowns.html">
								<i class="icon-large icon-sort"></i> Dropdowns
							</a>
						</li>
						<li>
							<a href="tabs.html">
								<i class="icon-large icon-columns"></i> Tabs
							</a>
						</li>
						<li>
							<a href="breadcrumbs-paginations.html">
								<i class="icon-large micon-loop"></i> Breadcrums & Paginations
							</a>
						</li>
						
						<li>
							<a href="alerts.html">
								<i class="icon-large micon-bell"></i> Alerts
							</a>
						</li>
						<li>
							<a href="progress-bars.html">
								<i class="icon-large micon-paragraph-left"></i> Progress Bars
							</a>
						</li>
						<li>
							<a href="pickers-sliders.html">
								<i class="icon-large micon-equalizer"></i> Pickers & Sliders
							</a>
						</li>
						<li>
							<a href="modals.html">
								<i class="icon-large micon-copy"></i> Modals
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="charts.html">
						<i class="micon-stats-up"></i>
						<span class="hidden-phone">Charts</span>
					</a>
				</li>
				<li>
					<a href="maps.html">
						<i class="micon-location"></i>
						<span class="hidden-phone">Maps</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="micon-checkbox"></i>
						<span class="hidden-phone">Form</span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="form-elements.html">
								<i class="icon-large icon-th-large"></i> Form elements
							</a>
						</li>
						<li>
							<a href="form-input-sizes.html">
								<i class="icon-large icon-th-large"></i> Input Size
							</a>
						</li>
						<li>
							<a href="form-control-states.html">
								<i class="icon-large icon-th-large"></i> Form control states
							</a>
						</li>
						<li>
							<a href="wysiwyg.html">
								<i class="icon-large icon-th-large"></i> WYSIWYG
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="widgets.html">
						<i class="micon-lab"></i>
						<span class="hidden-phone">Widgets</span>
					</a>
				</li>
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
