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

								<table class="table" name="tab_pelanggan" id="tab_team">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Team</th>
											<th>Nama STO</th>
											
										</tr>
									</thead>
								 
									<tbody>
									<?php
										include("connect.php");
										$pilihnama = $_GET['pilihnama'];
										$jumlah_baris = $_GET['jumlah_baris'];
										$fin_isactive= $_GET['isactive'];
 										$urutan = $_GET['id_team'];

 										if ($fin_isactive=="zzzd" && $urutan != "" && $jumlah_baris!=0){
 											mysql_query("update team set isactive=0 where id_team='$urutan' ;");
 										}



										$i=1;
										//DI BAGIAN INI DIATUR SESSION UNTUK USER TARUH DI "WHERE"
										if ($hak=="super") {
											$data = mysql_query("select * from team where isactive=1;");
										}elseif ($hak=="admin") {
											$data = mysql_query("SELECT * from team WHERE hak_pengguna_web='call' AND id_sto='$id_sto' AND isactive=1;");
										}

										if($pilihnama == ""){
											$data = mysql_query("SELECT * FROM team");
										}else{
											$data = mysql_query("SELECT * from team where nama_team like '%$pilihnama%';");
										}

										if($jumlah_baris!=""){
											$data = mysql_query("select * from team where isactive=1 limit 0, $jumlah_baris;");
										}

										function getHakPenggunaWeb($hak){
											if ($hak=="super"){$prev="Superadmin";}
											elseif ($hak=="admin") {$prev="Administrator";}
											elseif ($hak=="call") {$prev="Call Center";}
											return $prev;
										}

										function getTeam(){
											$testinglagi = mysql_query("select nama_team from team where id_team=1");
											return $testinglagi;
										}

										$testinglagi = getTeam();

										while ($databaru=mysql_fetch_array($data)){
											$baca_index[$i] = $databaru[id_pengguna_device];											
											echo "<tr class='warning'>";
											//echo "<td>".$databaru[$i]."</td>";
											echo "<td>".$i."</td>";
											
											$pilih_team = mysql_query("select nama_team from team where id_team='$databaru[id_team]'");
											$fin_pilih_team = mysql_fetch_array($pilih_team);										
											echo "<td>".$fin_pilih_team[nama_team]."</td>";
											

											$pilih_sto = mysql_query("select nama_sto from sto where id_sto='$databaru[id_sto]';");
											$fin_pilih_sto = mysql_fetch_array($pilih_sto);											
											echo "<td>".$fin_pilih_sto[nama_sto]."</td>";
											

											$pilih_area = mysql_query("select nama_area	from area where id_area='$databaru[id_area]';");
											$fin_pilih_area = mysql_fetch_array($pilih_area);										
											echo "<td>".$fin_pilih_area[nama_area]."</td>";
											echo "<td>".$fin_pilih_area[nama_area]."</td>";
											echo "<td>".$fin_pilih_area[nama_area]."</td>";
											
											
											echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' style='float:right' onClick=setDisable('zzzd','$databaru[id_team]');>Disable";
											
											echo "<a href='' class='btn btn-cl btn-small btn-primary' id='filter' data-toggle='modal' style='float:right' onClick=goToAnggotaTeam($databaru[id_team],$databaru[id_sto]);>Lihat Anggota";

											echo "<a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' style='float:right' onClick=setIdValue('$databaru[id_sto]','$databaru[id_team]','$databaru[nama_team]')>Update</td>";
										
											echo "</tr>";
											
											$i++;
											
										}


										?>

									</tbody>
									
								</table>					