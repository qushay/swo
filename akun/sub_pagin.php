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
<script type="text/javascript" src="library/js/jquery-1.8.3.min.js"></script>

<div class="pagination" id="tab_pagination">
						<script type="text/javascript"> 
							function ChangeClass(index)
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
											document.getElementById("pagination").innerHTML=xmlhttp.responseText;
											//alert(str);
											}
										  }
										//xmlhttp.open("POST","info.txt",true);
										xmlhttp.open("GET","../akun/sub_pagin.php",true);
										document.getElementById(new_pagin).class='active';
										$('.index').val("active");
										
										console.log("Indexnya adalah");
										xmlhttp.send();
							}
	
						</script>
						
	
						
						
						<ul id="ul_pagin">
							
							<?php
							
							$jumlah_baris = $_GET['jumlah_pagin'];
							include("connect.php");

							$new_pagin=1;
							$no_pagin=1;
							function buatPagination(){
								$no_pagin=1;
								echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
								$hitung_data = mysql_query("select id_team from penggunaweb");
								$jumlah_hitung_data = mysql_num_rows($hitung_data);	
								if($jumlah_hitung_data<100){
									$jumlah_pagin=1;
								}

								

								while ($no_pagin<=$jumlah_pagin){
									
										echo "<li id='$no_pagin' class='$no_pagin' onClick=ChangeClass('$no_pagin');><a href='#'>".$no_pagin."</a></li>";
										$no_pagin=$no_pagin+1;
								}
								echo "<li><a href='#'>&raquo;</a></li>";
							}
							buatPagination();

							?>
							
						</ul>

						
						
				</div>


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