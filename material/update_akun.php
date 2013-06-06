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
				<form class="navbar-search pull-right hidden-phone" />
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
						<i class="icon-th-large"></i>Update Pengguna Web
					</h2>
					
					<div class="page-info hidden-phone">
						<ul class="stats">
							<li>
								<span class="large text-warning">2354</span>
								<span class="mini muted">visitors</span>
							</li>
							<li>
								<span class="large text-info">4523</span>
								<span class="mini muted">members</span>
							</li>
							<li>
								<span class="large text-success">5673</span>
								<span class="mini muted">orders</span>
							</li>
							<li>
								<span class="large text-error">15</span>
								<span class="mini muted">cancellation</span>
							</li>
						</ul>
					</div>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="#">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="#">Form</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Form elements</li>
					
				</ul>
				
				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span7">										
						
						<div class="well widget">
							
							
							<div class="widget-header">
								<h3 class="title">Data Material</h3>
							</div>

							<!-- <div class="c-alert pillow-emboss">
								<div class="alert-message"> -->
									<!-- <a class="close" href="#"><i class="icon-large icon-remove-circle"></i> --></a>
							<!-- 		<span id="result">Silakan Input Penggunaan Material untuk Work Order</span>

								</div>
							</div>
							-->
						
							<?	//$id_penggunaan_material = $_GET['id_penggunaan material'];
								/*mysql_connect("localhost","root","yastahaa");
								mysql_select_db("swo");*/
								include("connect.php");
								$id_pengguna_web = $_GET['id_pengguna_web'];
								$query = mysql_query("select * from penggunaweb where id_pengguna_web='$id_pengguna_web';");
								
								while($row = mysql_fetch_array($query)){
									$id_pengguna_web = $row["id_pengguna_web"];
									$username_pengguna_web = $row["username_pengguna_web"];
									$password_pengguna_web = $row["password_pengguna_web"];
									$id_sto = $row["id_sto"];
									$hak_pengguna_web = $row["hak_pengguna_web"];
									$pembuat_pengguna_web = $row["pembuat_pengguna_web"];
								
									
								}
								
								
							?>
							<script>
								function gotoTampilUser()
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
										var url = location.href = "../akun_material/tampil_user.php";
										
										xmlhttp.send();
									}
							</script>
							
							<form method="post" action="updateak.php" name="insertmatForm" id="insertmatForm"/>
								<fieldset>
									
									
									<label>Id Pengguna Web</label>
									<input type="text" class="span8" placeholder="Input Id Pengguna Web" name="id_pengguna_web" id="id_pengguna_web" value='<? echo $id_pengguna_web; ?>' />
									<hr />
											
									<label>Username</label>
									<input type="text" class="span8" placeholder="Input Username" name="username_pengguna_web" id="username_pengguna_web" value='<? echo $username_pengguna_web; ?>'/>
									<hr />
									
									<label>Password</label>
									<input type="text" class="span8" placeholder="Input Password Pengguna Web" name="password_pengguna_web" id="password_pengguna_web" value='<? echo $password_pengguna_web; ?>'/>
									<hr />
									
									<label>Id STO</label>
									<input type="text" class="span8" placeholder="Input ID STO" name="id_sto" id="id_sto" value='<? echo $id_sto; ?>'/>
									<hr />
									
									<label>Hak Pengguna Web</label>
												<?		
												
													if($hak_pengguna_web=="Super Admin"){
														echo "<select class='span8' name='hak_pengguna_web' id='hak_pengguna_web'>";
														echo "<option selected/>super";
														echo "<option />admin";
														echo "<option />call";
														//echo "<option />Team";
														echo "</select>";
													}else{
														if($hak_pengguna_web=="Call Center"){
															echo "<select class='span8' name='hak_pengguna_web' id='hak_pengguna_web'>";
															echo "<option />super";
															echo "<option />admin";
															echo "<option selected/>call";
															//echo "<option />Team";
															echo "</select>";
														}else{
															if($hak_pengguna_web=="Admin"){
																echo "<select class='span8' name='hak_pengguna_web' id='hak_pengguna_web'>";
																echo "<option />super";
																echo "<option selected/>admin";
																echo "<option />call";
																//echo "<option />Team";
																echo "</select>";	
															}else{
																echo "<select class='span8' name='hak_pengguna_web' id='hak_pengguna_web'>";
																	echo "<option />super";
																	echo "<option />admin";
																	echo "<option selected/>call";
																	//echo "<option selected/>Team";
																	echo "</select>";
																/*if($hak_pengguna_web=="Team"){
																	echo "<select class='span8' name='hak_pengguna_web' id='hak_pengguna_web'>";
																	echo "<option />super";
																	echo "<option />admin";
																	echo "<option />call";
																	echo "<option selected/>Team";
																	echo "</select>";	
																}else{
																	echo "<select class='span8' name='hak_pengguna_web' id='hak_pengguna_web'>";
																	echo "<option />Super Admin";
																	echo "<option />Admin";
																	echo "<option />Call Center";
																	echo "<option selected/>Team";
																	echo "</select>";
																}*/

															}
														}
													}

												?>
									<hr />			
									<!-- <label>Hak Pengguna Web</label>
									<input type="text" class="span8" placeholder="Input Hak Pengguna Web" name="hak_pengguna_web" id="hak_pengguna_web" value='<? echo $hak_pengguna_web; ?>'/>
									<hr />
									-->
									<label>Pembuat Pengguna Web</label>
									<input type="text" class="span8" placeholder="Input Pembuat Pengguna Web" name="pembuat_pengguna_web" id="pembuat_pengguna_web" value='<? echo $pembuat_pengguna_web; ?>'/>
									<hr />
									

									
									<label>&nbsp;</label>
									
									<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
									<div class="widget-content">
									<a href="#myModal" roll=button id="sub1" class="btn btn-large btn-primary" data-toggle="modal">Edit</a> 
										
									</div>
									
						
						
						
									<!-- default modal -->
									<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Konfirmasi Input Akun</h3>
										</div>
										<div class="modal-body">
											<p> Apakah data sudah benar dan lengkap ? </p>
										</div>
										<div class="modal-footer">
										
											<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
											<!-- <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="">Input</button> -->								
											<a href="#myModal2" data-toggle="modal" id="sub" class="btn btn-primary" aria-hidden="true" data-dismiss="modal">Input</a>
											
										</div>
									</div>
									<!-- ************ -->
								
									<!-- default modal -->
									<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
											<h3 id="myModalLabel">Konfirmasi Input Material</h3>
										</div>
										<div class="modal-body">
											<p> Data berhasil di-inputkan...</p>
										</div>
										<div class="modal-footer">
										
											<a href="tampil_user.php" class="btn" data-dismiss="modal" aria-hidden="true" onClick="gotoTampilUser();">Ok</a>
											<!-- <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="">Input</button> -->							
											
										</div>
									</div>
								<!-- ************ -->
								</fieldset>
								
							</form>
							
							
							<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
							<script type="text/javascript" src="updatemat.js"></script>
						</div>
					</div>
					
					
					<div class="span5">
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
				<li class="dropdown">
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
						<li>
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
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="micon-checkbox"></i>
						<span class="hidden-phone">Form</span>
					</a>
					<ul class="dropdown-menu">
						<li class="active">
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