<?php
	session_start();
	include '../session.php';

	require "get_data.php";
	$get_data1=new get_data();

	if (isset($_GET['tab'])){
		$jml_tab=$_GET['tab'];
	}else{
		$jml_tab=1;
	}

	if(isset($_GET['edit'])&&isset($_GET['idp'])){
		$edit=1;
		$idp=$_GET['idp'];
	}else{
		$edit=0;
		$idp=0;
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

		<script type="text/javascript" src="../library/js/jquery-latest.min.js"> </script>
		<script> 
			$(document).ready(function(){
		        function showGrowl(sukses,info){
                	$.growlUI(sukses, info); 
            	}
				 
				var prov;var sto;var kab;var kec; var kel; 
				var id_line=[];var dp_lama=[];var existing=[];var jenis_ont=[];
				var existing_pots=[];var existing_speedy=[];var existing_iptv=[];
				var nama; var alamat;var norumah; var kodepos;
				var datap;var datal=[];var datanya;
				var jml_tab=<?php echo $jml_tab; ?>;
				var edit=<?php echo $edit; ?>;
				var edit_idp="<?php echo $idp; ?>";
				if (edit!=0 && edit_idp!=0){

					$.ajax({ 
		                url: "get_data.php", 
		                data: "edit=edit_pelanggan&idp="+edit_idp, 
		                cache: false, 
		                success: function(msg){ 
		                    data = msg.split("|"); 
		                     
		                    //masukkan ke masing-masing textfield
		                    $("#inputIDPelanggan").val(edit_idp);
					        $("#inputNama").val(data[0]);
					        $("#inputAlamat").val(data[1]); 
					        $("#inputNomerRumah").val(data[2]);
					        $("#inputKodePos").val(data[3]);

					        $("#inputProvinsi").val(data[4]).attr('selected',true);;
					        $("#inputSTO").val(data[5]); 
					        $("#inputKabupaten").val(data[6]);
					        $("#inputKecamatan").val(data[7]); 
					        $("#inputKelurahan").val(data[8]); 
					        j=0;
					        for (var i=0;i<jml_tab;i++){
					        	k=i+1;
					        	$("#inputIDLine"+[k]+"").val(data[j+9]);
						        $("#inputDPLama"+[k]+"").val(data[j+10]);
						        $("#inputJenisONT"+[k]+"").val(data[j+11]);
						        $("#inputPOTS"+[k]+"").val(data[j+12]);
						        $("#inputSpeedy"+[k]+"").val(data[j+13]);
						        $("#inputIPTV"+[k]+"").val(data[j+14]);
					        	j=j+6;
					    	}
		                } 
		            }); 
					
				}
				
				$("#inputSTO").load("get_data.php","op=get_dropdown_sto");
				$("#inputProvinsi").change(function(){

					prov=$("#inputProvinsi").val();
					$("#inputSTO").load("get_data.php","op=get_dropdown_sto&prov="+prov);
				});
				$("#inputButton").click(function(){ 
			        //ambil nilai-nilai dari masing-masing input 
			        idp = $("#inputIDPelanggan").val();
			        nama = $("#inputNama").val();
			        alamat = $("#inputAlamat").val(); 
			        norumah = $("#inputNomerRumah").val();
			        kodepos = $("#inputKodePos").val();

			        prov = $("#inputProvinsi").val();
			        sto = $("#inputSTO").val(); 
			        kab = $("#inputKabupaten").val();
			        kec = $("#inputKecamatan").val(); 
			        kel = $("#inputKelurahan").val(); 

			        datap = "&idp="+idp+"&nama="+nama+"&alamat="+alamat+"&norumah="+norumah+"&kodepos="+kodepos; 
			        datap = datap+"&sto="+sto+"&prov="+prov+"&kab="+kab+"&kec="+kec+"&kel="+kel; 
			        datap = datap+"&jml="+jml_tab;
			        datanya = datap;

			        // console.log(datap);

			        for (var i=0;i<jml_tab;i++){
			        	var k=i+1;
			        	datal=[];

			        	id_line[i] = $("#inputIDLine"+[k]+"").val();
				        dp_lama[i] = $("#inputDPLama"+[k]+"").val();
				        jenis_ont[i] = $("#inputJenisONT"+[k]+"").val();
				        existing_pots[i] = $("#inputPOTS"+[k]+"").val();
				        existing_speedy[i] = $("#inputSpeedy"+[k]+"").val();
				        existing_iptv[i] = $("#inputIPTV"+[k]+"").val();


				    	datal[i] = "&id_line"+[i]+"="+id_line[i]+"&dp_lama"+[i]+"="+dp_lama[i]+"&jenis_ont"+[i]+"="+jenis_ont[i];
			        	datal[i] = datal[i]+"&existing_pots"+[i]+"="+existing_pots[i]+"&existing_speedy"+[i]+"="+existing_speedy[i]+"&existing_iptv"+[i]+"="+existing_iptv[i];
			        	datanya = datanya +datal[i];
			    	}
			    	console.log(datanya);
			        if (edit!=0 && edit_idp!=0){
				        $.ajax({ 
					        url: "store_data.php", 
					        data: "op=insert"+datanya, 
					        cache: false, 
					        success: function(){ 
						        showGrowl("Sukses","");
						        setTimeout(location.href = "data.php", 2000);
	 
				       		} 
				        }); 	
			        }else{
			        	$.ajax({ 
					        url: "store_data.php", 
					        data: "op=insert"+datanya, 
					        cache: false, 
					        success: function(){ 
						        showGrowl("Sukses","");
						        setTimeout(location.href = "./", 2000);
	 
				       		} 
				        }); 
			        }
    			}); 


			}); 
		</script> 

		<script type="text/javascript">
						
			$(document).ready(
				function(){
					$("#clickImportxxx").click(
						function(){
								
								console.log("TES");
								$('.progress').show();
								var increment = 10;
								var progress = setInterval(function() {
								    var $bar = $('.bar');
								    increment = increment +10;
									$bar.width(increment +"%");
								    $bar.text( increment+ "%");
								    
								    if (increment == 110){
								    	clearInterval(progress);
								    	$('.progress').removeClass('active');
								    	$('.progress').hide();
								    	//$('.progress').show();
								    }
							    
								}, 800);

							return false;
						}
						
					)


					$("#submitexxx").click(
						function(){
							$.post("upload_file.php",$("#uploadform").serialize(),
								function(){
									console.log("OKE");
									
								}
							
							);
							return false;
						}
						
					)

				}
			);


			function getPanjangData(tes)
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
					//document.getElementById("body_utama").innerHTML=xmlhttp.responseText;
					//alert(str);
					}
				  }

				var url = location.href = "../pelanggan/index.php?status="+tes;
				
				
				xmlhttp.send();

			}

			$(function() {
			   $('#clickImport').click( function() {
			   	  console.log("KlikIMPORT");
			   	  document.getElementById("imagegif").innerHTML="<img src='../pelanggan/loading_spin.gif' width='100' height='100'>"
			      $('#uniform-upl').hide();
			      $('#imagegif').show();
			      $('#clickImport').hide();
			      document.getElementById("label-import").innerHTML="Sedang Input Data Excel...";
			      $(this).load( '../pelanggan/sub_proses.php?status=1', function() {
			          $('#imagegif').hide();
			          document.getElementById("label-import").innerHTML="Input Data Berhasil !";
			          location.href('../pelanggan/index.php');
			          
			      });
			   });
			});

			function progress_new(length){

				console.log("TES");
				$('.progress').show();
				var increment = 1;
				var progress = setInterval(function() {
				    var $bar = $('.bar');
				    increment = increment +1;
				    persen = (increment / length) * 100;
					$bar.width(persen +"%");
				    $bar.text( persen+ "%");
				    
				    if (increment == length){
				    	clearInterval(progress);
				    	$('.progress').removeClass('active');
				    	$('.progress').hide();
				    	$('#clickImport').hide();
				    	//$('.progress').show();
				    }
			    
				}, 800);

			return false;
			}
					
		</script>
		<script>
		$().ready(
			function(){
				$('.progress').hide();
			}
		);
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
						<i class="icon-table"></i> Input Pelanggan
					</h2>
					
				</div>
				<!-- ./ page heading -->
				
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php">Home</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="#">Pelanggan</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">Input</li>
				</ul>
				
				
				<!-- post wrapper -->				
				<div class="row-fluid">

					<div class="span12">
						
						<!-- widget -->
						<div class="well widget">
							<!-- widget header -->
							<div class="widget-header">
								<h3 class="title">Input Pelanggan</h3>
							</div>

							<div class="row-fluid">
								<form class="span4 well widget"  style="background-color:#fff;">
									<div class="control-group">
										<label class="control-label" for="inputIDPelanggan">ID Pelanggan</label>
										<div class="controls">
											<input type="text" id="inputIDPelanggan" placeholder="ID Pelanggan" class="span6" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputNama">Nama</label>
										<div class="controls">
											<input type="text" id="inputNama" placeholder="Nama" class="span12" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputAlamat">Alamat</label>
										<div class="controls">
											<textarea rows="3" id="inputAlamat" class="span12" placeholder="Alamat"></textarea>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputNomerTelpon">Nomer Rumah</label>
										<div class="controls">
											<input type="text" id="inputNomerRumah" placeholder="Nomer Rumah" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputKodePos">Kode Pos</label>
										<div class="controls">
											<input type="text" id="inputKodePos" placeholder="Kode Pos" />
										</div>
									</div>
								</form>
							
								<form class="span4 well widget"  style="background-color:#fff;">
									<div class="control-group">
										<label class="control-label" for="inputProvinsi">Provinsi</label>
										<div class="controls">
											<div class="widget-nav">
												<?php 
													if ($hak=="super"){
														echo '<select id="inputProvinsi" class="chzn-select-deselect span12" data-placeholder="Pilih Provinsi">';
															$get_data1->getProvinsi();
													}else{
														echo '<select id="inputProvinsi" class="chzn-select-deselect span12" data-placeholder="Pilih Provinsi" disabled>';
															$get_data1->getProvinsi_bySTO($id_sto);	
													}
													echo '</select>';
												?>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputSTO">STO</label>
										<div class="controls">
											<div class="widget-nav">
												<?php 
													if ($hak=="super"){
														echo '<select id="inputSTO" class="span12" data-placeholder="Pilih STO">';
													}else{
														echo '<select id="inputSTO" class="span12" data-placeholder="Pilih STO" disabled>';
															
													}
													echo '</select>';
												?>
											</div>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputKabupaten">Kabupaten</label>
										<div class="controls">
											<div class="widget-nav">
												<input type="text" id="inputKabupaten" placeholder="Kabupaten" class="span12" />
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputKecamatan">Kecamatan</label>
										<div class="controls">
											<div class="widget-nav">
												<input type="text" id="inputKecamatan" placeholder="Kecamatan" class="span12" />
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputKelurahan">Kelurahan</label>
										<div class="controls">
											<div class="widget-nav">
												<input type="text" id="inputKelurahan" placeholder="Kelurahan" class="span12" />
											</div>
										</div>
									</div>
								</form>

								<div id="formNotel" class="span4">
									<?php
										if (isset($_GET["tab"])){
											$jml_tab=$_GET["tab"];
											$get_data1->getFormNotel($jml_tab);
										}else{
											$get_data1->getFormNotel("1");
										}
									?>
								</div>
								
								<div class="control-group pull-right">
									<div class="controls">
										<?php 
											if (isset($_GET['edit'])){
												echo '<a id="inputButton" type="submit" class="btn btn-info"><i class="icon-download-alt"></i> Edit</a>';
											}else{
												echo '<a id="inputButton" type="submit" class="btn btn-info"><i class="icon-download-alt"></i> Input</a>';
									
											}
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- ./ widget -->
					</div>
										
				</div>

				<!-- post wrapper -->				
				<div class="row-fluid">
					<div class="span12">
						
						<!-- widget -->
						<div class="well widget">
							<div class="widget-header">
								<h3 class="title">Import Data Pelanggan</h3>
							</div>
							
							<label id="label-import">Import file excel dengan format yang telah ditentukan.</label>	

								<div id="uniform-upl" style="margin-bottom: 0px;">
									<form action="upload_file.php" method="post" enctype="multipart/form-data" name="uploadform" id="uploadform">
									<input type="file" name="file" class="span8 fancy" id="file" style="margin-bottom: 0px; opacity: 0;" size="19" />
									 <input type="submit" name="submitex" id="submitex" value="Submit"/>
									</form>
								</div>
								
								<div id="imagegif" align="center">
								</div>

								<br /><br />

								<?php
									if (isset($_GET['status'])){
										$angka = $_GET['status'];
										if($angka !=""){
											$length = getDataLength(1);									
										}else{
											//$length = getDataLength(0);
											$length = 1;
										}

									}
									function getDataLength($status){
										
										if ($status==1){
											
											error_reporting(E_ALL);
											ini_set('display_errors', TRUE);
											ini_set('display_startup_errors', TRUE);
											date_default_timezone_set('Europe/London');

											define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

											/** Include PHPExcel */
											require_once '../excel/Classes/PHPExcel.php';


											// Create new PHPExcel object
											// echo date('H:i:s') , " Create new PHPExcel object" , EOL;
											$objPHPExcel = new PHPExcel();
											$objPHPExcel = PHPExcel_IOFactory::load("/var/www/excelfile/tableawal.xlsx");

											$i=3;
											$sum_rows = 0;
											$value = $objPHPExcel->getActiveSheet()->getCell("C3")->getValue();
											$total_data = $objPHPExcel->getActiveSheet()->getHighestRow();
											while($i<($total_data)){
												//$exvalue = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
												$exid_pelanggan = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
												$exid_sto = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
												$exnama_pelanggan = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
												$exalamat_pelanggan = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
												$exnomor_rumah = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
												$exprovinsi = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
												$exkelurahan_pelanggan = $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
												$exkecamatan_pelanggan = $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
												$exkota_kabupaten_pelanggan = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
												$exkode_pos_pelanggan = $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
												
												if($exid_pelanggan != ""){
													mysql_query("INSERT INTO pelanggan(id_pelanggan, id_sto, nama_pelanggan, alamat_pelanggan, nomor_rumah, provinsi_pelanggan, kelurahan_pelanggan, kecamatan_pelanggan, kota_kabupaten_pelanggan, kode_pos_pelanggan) 
														VALUES ('$exid_pelanggan','$exid_sto','$exnama_pelanggan','$exalamat_pelanggan','$exnomor_rumah','$exprovinsi','$exkelurahan_pelanggan','$exkecamatan_pelanggan','$exkota_kabupaten_pelanggan','$exkode_pos_pelanggan');");
													$sum_rows++;
												}

												$i++;
											}

											//$value = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
											//return ($sum_rows);
											return($sum_rows);
										}else{
											return(0);
										}
									}

								

								// echo $length;								
								//getPanjangData(1);
								?>


								<button class="btn btn-info" id="clickImport" name="clickImport"><i class="icon-external-link"></i> Import</button>
								<br ><br />

								<!-- <div class="progress progress-success progress-striped active">
									<div class="bar" style="width: 10%"></div>
								</div> -->
						</div>



					</div>
				</div>
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
		<script src="../library/js/bootstrap-inputmask.min.js"></script>
				
		<!-- plugins loader -->
		<script src="../library/js/loader.js"></script>

		
	</body>
</html>