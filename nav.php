<?php
	include '../session.php';
	include '../domain.php';
?>
				<li class="avatar hidden-phone">
					<a href="#">
						<img src="../library/images/avatar.png" />
						<span><?php echo $_SESSION['username']; ?></span>
					</a>
				</li>

				<?php 
				//INFO 
				if ($hak=="call"||$hak=="admin"||$hak=="super"){
					echo '
					<li>
						<a href="'.$domain.'">
							<i class="micon-info"></i>
							<i id="iconNewNotif" class="icon-exclamation-sign" style="margin:-50px 0 20px 40px;font-size:20px;color:#E02427;"></i>
							<span class="hidden-phone">Info</span>
						</a>
					</li>';
				}
				//GRAFIK
				if ($hak=="admin"||$hak=="super"){
					echo '
					<li>
						<a href="'.$domain.'grafik/">
							<i class="micon-bars"></i>
							<span class="hidden-phone">Grafik</span>
						</a>
					</li>';
				}
				//PETA 
				if ($hak=="super"||$hak=="admin"||$hak=="call"){
					echo '
					<li>
						<a href="'.$domain.'peta/">
							<i class="micon-location"></i>
							<span class="hidden-phone">Peta</span>
						</a>
					</li>';
				}
				

				//PELANGGAN
				if ($hak=="super"||$hak=="admin"||$hak=="call"){
					echo '
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="micon-user"></i>
							<span class="hidden-phone">Pelanggan</span>
						</a>
						<ul class="dropdown-menu">';
						if ($hak=="super"||$hak=="admin"){
							echo '<li>
								<a href="'.$domain.'pelanggan/">
									<i class="icon-large icon-pencil"></i> Input
								</a>
							</li>';
							}
							echo '
							<li>
								<a href="'.$domain.'pelanggan/data.php">
									<i class="icon-large icon-table"></i> Data
								</a>
							</li>
							';
					echo '
						</ul>
					</li>';
				}

				//WORK ORDER
				if ($hak=="super"||$hak=="admin"||$hak=="call"){
					echo '
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="micon-checkbox"></i>
							<span class="hidden-phone">Work Order</span>
						</a>
						<ul class="dropdown-menu">';
						if ($hak=="super"||$hak=="call"||$hak=="admin"){
							echo '
							<li>
								<a href="'.$domain.'wo/">
									<i class="icon-large icon-phone"></i> Call Instalasi
								</a>
							</li>
							<li>
								<a href="'.$domain.'wo/migrasi_call.php">
									<i class="icon-large icon-phone"></i> Call Migrasi
								</a>
							</li>';
						}
						// if ($hak=="call"||$hak=="admin"||$hak=="super"){
						// 	echo '
						// 	<li>
						// 		<a href="http://localhost/swo/wo/assignment.php">
						// 			<i class="icon-large icon-calendar"></i> Assignment
						// 		</a>
						// 	</li>';
						// }
						if ($hak=="super"||$hak=="admin"||$hak=="call"){
							echo '
							<li>
								<a href="'.$domain.'wo/reject_fo.php">
									<i class="icon-large icon-cut"></i> Rejected By Team FO
								</a>
							</li>';
						}
						if ($hak=="super"||$hak=="admin"||$hak=="call"){
							echo '
							<li>
								<a href="'.$domain.'wo/reject.php">
									<i class="icon-large icon-cut"></i> Rejected By Call Center
								</a>
							</li>';
						}
						if ($hak=="super"||$hak=="admin"||$hak=="call"){
							echo '
							<li>
								<a href="'.$domain.'wo/done.php">
									<i class="icon-large icon-thumbs-up"></i> Selesai
								</a>
							</li>';
						}
					echo '
						</ul>
					</li>';
				}

				//GRAFIK
				if (false){
					echo '
					<li>
						<a href="'.$domain.'charts.html">
							<i class="micon-stats-up"></i>
							<span class="hidden-phone">Grafik</span>
						</a>
					</li>';
				}

				//MATERIAL
				if ($hak=="super"||$hak=="admin"){
					echo '
					<li>
						<a href="'.$domain.'material/tampil_pmaterial.php">
							<i class="micon-lab"></i>
							<span class="hidden-phone">Material</span>
						</a>
					</li>';
				}

				//AKUN
				if ($hak=="super"||$hak=="admin"){
					
					echo '
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="micon-user-3"></i>
							<span class="hidden-phone">Akun</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="'.$domain.'akun/tampil_user.php">
									<i class="icon-large icon-table"></i> Pengguna Web
								</a>
							</li>
							<li>
								<a href="'.$domain.'akun/device_user.php">
									<i class="icon-large icon-table"></i> Pengguna Device
								</a>
							</li>
							<li>
								<a href="'.$domain.'akun/team_user.php">
									<i class="icon-large icon-table"></i> Team Pengguna Device
								</a>
							</li>
						</ul>
					</li>';
				}	
				//LOG
				if ($hak=="super"||$hak=="admin"){
					echo '
					<li>
						<a href="'.$domain.'log/">
							<i class="micon-clipboard-2"></i>
							<span class="hidden-phone">Log</span>
						</a>
					</li>';
				}
				?>


<script> 
    $(document).ready(function(){ 
    	$("#iconNewNotif").hide();
    	var hak="<?php echo $hak; ?>";
    	if (hak=="call"){
	        getNotif();
	        setInterval(function(){getNotif();}, 5000);
	    }
		function getNotif(){
			var id_sto=<?php echo $id_sto; ?>;
			var id_pengguna=<?php echo $id_pengguna; ?>;
			$.ajax({ 
                url: "../main/get_data.php", 
                data: "op=get_tolak_wo_by_sto_pengguna&id_sto="+id_sto+"&id_pengguna="+id_pengguna, 
                
        		async:false,
                success: function(msg){ 
                	if (msg==0){
						$("#iconNewNotif").hide();
                	}else if(msg==1){
                		$("#iconNewNotif").show();
                	}
             	} 
            });
			
		}
       
    }); 
</script> 
