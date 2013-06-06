<?php
	session_start();
	include("../session.php");

	if(isset($_GET['p'])){$limit_start=($_GET['p']);}else{$limit_start="0";};
	include ("../connect.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>Data Material</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Olas Navigator" />

		<!-- required styles -->
		<link href="library/assets/css/bootstrap.css" rel="stylesheet" />
		<link href="library/assets/css/bootstrap-responsive.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<link href="library/css/base.css" rel="stylesheet" />
		<script type="text/javascript" src="../library/js/jquery-latest.min.js"></script>
		<script> 
			$(document).ready(function(){ 
				var page=<?php echo $limit_start; ?>;

		    	$("#get_material").load("get_data.php","op=get_material&p="+page);
			    $("#get_pagination").load("get_data.php","op=get_pagination");
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
				
				
			</div>
		</div>
		<!-- end header -->			
		
		<div id="left_layout">
			<!-- main content -->
			<div id="main_content" class="container-fluid">
			
				<!-- page heading -->
				<div class="page-heading">
				
					<h2 class="page-title muted">
						<i class="icon-table"></i> Data Penggunaan Material
					</h2>
					
					<div class="page-info hidden-phone">
						<ul class="stats">
							<li>
								<span class="large text-warning">
								<?php
								
								function hitungJumPelanggan(){
									$hitung_pel = mysql_query("SELECT * FROM penggunaanmaterial");
									$jml_pelanggan = mysql_num_rows($hitung_pel);
									return $jml_pelanggan;
								}
								$final_jum_pel = hitungJumPelanggan();
								echo $final_jum_pel;
								?>
								</span>
								<span class="mini muted">Team</span>
							</li>
							
						</ul>
					</div>
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="../">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Material</li>
				</ul>
				
				<a class="btn btn-cl" href="#myModalAddTeamMaterial" data-toggle='modal' id="buttonAddMaterial"	style="margin-bottom:5px;"><i class="icon-plus"></i> Material</a>

				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="">
					
						

						
					</div>
					<div class="">
						
						<!-- widget -->
						<div class="well widget">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Data Penggunaan Material</h3>
								<input type="text" id="searchbyname" name="searchbyname" placeholder="Cari Nama Team..." class="span8" style="float:right; margin-top:2px; width:200px;" onKeyup="pilihNama();" />
							</div>
							<!-- ./ widget header -->
							
							<!-- widget content -->
							<div class="widget-content">
								<table class="table" name="tab_team" id="tab_team">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Team</th>
											<th>Jumlah ONT</th>
											<th>Jumlah Roset</th>
											<th>Kabel_50</th>
											<th>Kabel_75</th>
											<th>Kabel_100</th>
											<th>Jumlah Duct</th>
											<th>Jumlah Flexible Pipe</th>
											<th>Terakhir Ambil </th>
											<th>Pembuat Penggunaan Material</th>
										</tr>
									</thead>
								 
									<!-- Menampilakn data material -->
									<tbody id="get_material">
									
						<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>
						<script type="text/javascript">
						$(document).ready(
							function(){
								$("#executeTambahTeamMaterial").click(
									function(){
										$.post("insertmat.php",$("#insertmatForm").serialize(),
											function(data){
												if($("#id_sto").val()==""){
													//alert("Maaf ID STO Masih Kosong");
												}
												console.log("jadi bro");

											}
										
										);
										return false;
									}
									
								)

								$("#executeTambahMaterial").click(
									function(){
										$.post("insertmat2.php",$("#insertmatForm2").serialize(),
											function(data){
												if($("#id_sto").val()==""){
													//alert("Maaf ID STO Masih Kosong");
												}
												console.log("jadi bro");

											}
										
										);
										return false;
									}
									
								)


							}
						);
						</script>									
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
											var id_penggunaan_material = document.getElementById("updatevalue").innerHTML;
											location.href = "../material/update_material.php?id_penggunaan_material="+id_penggunaan_material;
											//xmlhttp.open("POST","info.txt",true);
											xmlhttp.open("GET","update_material.php?id_penggunaan_material="+id_penggunaan_material,true);
											xmlhttp.send();
											}
											
											function setIdValue(id_team, jml_ont){
												//var tes = document.getElementById("myModalLabel").innerHTML="joni";
												var value = document.getElementById("updatevalue").innerHTML=id_team;
												var ont_jumlah = $("#jml_ont").val(jml_ont);
												tes = $("#jml_ont").val();
												console.log(tes);
												//alert(tes);
											}

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
												
												}
											  }
											//var id_penggunaan_material = document.getElementById("updatevalue").innerHTML;
											var id_pengguna_web = document.getElementById("updatevalue").innerHTML;
											//var url = location.href = "http://localhost/Kuta_Admin/update_material.php?id_penggunaan_material="+id_penggunaan_material;
											//xmlhttp.open("POST","info.txt",true);
											var url = location.href = "../material/tampil_pmaterial.php";
											xmlhttp.open("GET","update_akun.php?id_penggunaan_material="+id_penggunaan_material,true);
											xmlhttp.send();
											}

											function clickAddMaterial(id_team, sn_ont){

												$("#id_team2").val(id_team);
												$("#sn_ont2").val(sn_ont);
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
												document.getElementById("tab_team").innerHTML=xmlhttp.responseText;
												
												}
											  }
											
												var value=$('#searchbyname').val();
												xmlhttp.open("GET","../material/sub_tampil_pmaterial.php?pilihnama="+value,true);
												console.log(value);
												xmlhttp.send();
											}
										</script>
										
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


									
				<!-- Modal Add Team Material -->
				<div id="myModalAddTeamMaterial" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
						<h3 id="myModalLabel">Tambah Team</h3>
					</div>
					<div class="modal-body">
			
					<form method="post" action="insertmat.php" name="insertmatForm" id="insertmatForm"/>
					<fieldset>
						
						<!-- <label>Id Team</label>
						<input type="text" class="required" placeholder="Input Id Team" name="id_team" id="id_team"/> -->
						
							<?php
							function checkdiPmaterial($id_team){
								$q_get_nama_team = mysql_query("select id_team from penggunaanmaterial where id_team = ".$id_team);
								$get_rows = mysql_num_rows($q_get_nama_team);
								if($get_rows>0){
									return true;
								}else
									return false;
							}

								if($hak=="super"){	
									echo "<label>Pilih Team</label>";
									echo "<select class='cselect span8' style='width:200px; z-index=-1' data-placeholder='Select category...' name='id_team' id='id_team'>";
									echo "<option />";

									$get_nama_team = mysql_query("select id_team,nama_team from team;");
									while($rows=mysql_fetch_array($get_nama_team,MYSQL_ASSOC)){
										$check = checkdiPmaterial($rows["id_team"]);
										if ($rows["id_team"]!="" && $check==false){
											echo "<option selected/>".$rows["nama_team"];
										}														
									}
									echo "</select>";
								}else{
									$get_nama_team = mysql_query("select nama_team from team where id_sto='$id_sto';");
									while($rows=mysql_fetch_array($get_nama_team)){
										echo "<label>Pilih Team</label>";
										echo "<input type='text' class='span8'  value='$rows[nama_team]' name='id_team' id='id_team' readonly/>";	
									}
								}
							
							?>

						<label>Jumlah ONT</label>
						<input type="text" class="span8" placeholder="Input Jumlah ONT" name="jml_ont" id="jml_ont"/>
						
						<!-- <label>Serial Number ONT</label>
						<input type="text" class="span8" placeholder="Input Serial Number ONT" name="sn_ont" id="sn_ont"/> -->
						
						<label>Jumlah ROSET</label>
						<input type="text" class="span8" placeholder="Input Jumlah Roset" name="jml_roset" id="jml_roset"/>
						
						<label>Kabel 50</label>
						<input type="text" class="span8" placeholder="Input Kabel 50" name="kabel_50" id="kabel_50"/>
						
						<label>Kabel 75</label>
						<input type="text" class="span8" placeholder="Input Kabel 75" name="kabel_75" id="kabel_75"/>
						
						<label>Kabel 100</label>
						<input type="text" class="span8" placeholder="Input Kabel 100" name="kabel_100" id="kabel_100"/>
						
						<label>Jumlah Duct</label>
						<input type="text" class="span8" placeholder="Input Jumlah Duct" name="jml_duct" id="jml_duct"/>
						
						<label>Jumlah Flexible Pipe</label>
						<input type="text" class="span8" placeholder="Input Flexible Pipe" name="jml_flex_pipe" id="jml_flex_pipe" />
						<!--
						<label>Tanggal Ambil</label>
						<input type="text" class="datePicker" value="07-07-2013" data-date-format="dd-mm-yyyy" placeholder="Input Tanggal Ambil" name="tgl_ambil" id="tgl_ambil"/>
						-->


						
						<label>&nbsp;</label>
					</fieldset>
						<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
					</form>	
					</div>
					<div class="modal-footer">
					
						<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
						<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
						<a href="#myModal2" data-toggle="modal" id="executeTambahTeamMaterial" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToTampilPmaterial()">Tambahkan</a> 
						
					</div>
				</div>
				<!-- ************ -->									


				<!-- Modal Add Material -->
				<div id="myModalAddMaterial" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
						<h3 id="myModalLabel">Tambah Material</h3>
					</div>
					<div class="modal-body">
			
					<form method="post" action="insertmat2.php" name="insertmatForm2" id="insertmatForm2"/>
					<fieldset>
						
						<label>Id Team</label>
						<input type="text" class="required" placeholder="Input Id Team" name="id_team2" id="id_team2" readonly/>
						
		
						<label>Jumlah ONT</label>
						<input type="text" class="span8" placeholder="Input Jumlah ONT" name="jml_ont2" id="jml_ont2"/>
						
						<!-- <label>Serial Number ONT</label>
						<input type="text" class="span8" placeholder="Input Serial Number ONT" name="sn_ont2" id="sn_ont2"/> -->
						
						<label>Jumlah ROSET</label>
						<input type="text" class="span8" placeholder="Input Jumlah Roset" name="jml_roset2" id="jml_roset2"/>
						
						<label>Kabel 50</label>
						<input type="text" class="span8" placeholder="Input Kabel 50" name="kabel_502" id="kabel_502"/>
						
						<label>Kabel 75</label>
						<input type="text" class="span8" placeholder="Input Kabel 75" name="kabel_752" id="kabel_752"/>
						
						<label>Kabel 100</label>
						<input type="text" class="span8" placeholder="Input Kabel 100" name="kabel_1002" id="kabel_1002"/>

						
						<label>Jumlah Duct</label>
						<input type="text" class="span8" placeholder="Input Jumlah Duct" name="jml_duct2" id="jml_duct2"/>
						
						<label>Jumlah Flexible Pipe</label>
						<input type="text" class="span8" placeholder="Input Flexible Pipe" name="jml_flex_pipe2" id="jml_flex_pipe2" />
						
						<!--<label>Tanggal Ambil</label>
						<input type="text" class="datePicker" value="07-07-2013" data-date-format="dd-mm-yyyy" placeholder="Input Tanggal Ambil" name="tgl_ambil2" id="tgl_ambil2"/> -->
						


						
						<label>&nbsp;</label>
						
						<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
					</fieldset>	
					</form>
					</div>
					<div class="modal-footer">
					
						<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
						<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
						<a href="#myModal2" data-toggle="modal" id="executeTambahMaterial" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="backToTampilPmaterial()">Tambahkan</a> 
						
					</div>
				</div>
				<!-- ************ -->									


				<!-- default modal -->
				<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
						<h3 id="myModalLabel">Konfirmasi Detail Material</h3>
					</div>
					<div class="modal-body">
						<p> Detail Penggunaan Material dengan Id Penggunaan Material :  <p id="updatevalue"></p></p>
					</div>
					<div class="modal-footer">
					
						<button class="btn" data-dismiss="modal" aria-hidden="true">Back</button>
						<!-- <Input type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" data-dismiss="modal" value="Edit" > -->								
						<a href="#myModal2" data-toggle="modal" id="sub" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" onClick="loadUpdateMat()">Go To Detail</a> 
						
					</div>
				</div>
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
		<script src="library/assets/js/jquery.js"></script>
		<script src="library/assets/js/bootstrap.min.js"></script>
		
		<!-- addons -->
		<script src="library/plugins/chart-plugins.js"></script>
		<script src="library/plugins/jquery-ui-slider.js"></script>
		<script src="library/plugins/redactor/redactor.min.js"></script>
		<script src="library/plugins/jmapping/jquery.metadata.js"></script>
		<script src="library/plugins/jmapping/jquery.jmapping.min.js"></script>
		<script src="library/plugins/jquery.uniform.js"></script>
		<script src="library/plugins/chosen.jquery.min.js"></script>

		
				
		<!-- plugins loader -->
		<script src="library/js/loader.js"></script>
	</body>
</html>
