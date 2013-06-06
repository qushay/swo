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

								<table class="table" name="tab_pengguna" id="tab_pengguna">
									<thead>
										<tr>
											<th>No</th>
											<!-- <th>ID Pengguna Web</th> -->
											<th>Username</th>
											<th>Password</th>
											<th>Nama STO</th>
											<th>Hak Pengguna Web</th>
											<th>Nama Pengguna</th>
										</tr>
									</thead>
								 
									<tbody>
									
									
									<script>
										function setIdValue(id_pengguna_web, username_pengguna_web, password_pengguna_web, id_sto, hak_pengguna_web, nama){
											
											var username = $('#username_pengguna_web').val(username_pengguna_web);
											//document.getElementById("username_pengguna_web").value=username_pengguna_web;
											var password = document.getElementById("password_pengguna_web").value=password_pengguna_web;
											var id_pengguna = document.getElementById("id_pengguna_web").value=id_pengguna_web;
											var sto = document.getElementById("id_sto2").value=id_sto;
											
											var hak = $("#hak_pengguna_web").val(hak_pengguna_web);
											tes = $("#hak_pengguna_web").val();
											var temp_nama = $("#nama_tambah").val(nama);
											console.log(tes);
										}

										function setDisable(active_value, id_pengguna_web){
											var url = location.href = "../akun/tampil_user.php?isactive=zzzd&id_pengguna_web="+id_pengguna_web;
										}
									
									</script>
								
										<?php
										include("connect.php");
 										$fin_isactive= $_GET['isactive'];
 										$urutan = $_GET['id_pengguna_web'];
 										$pilihnama = $_GET['pilihnama'];

 										if ($fin_isactive=="zzzd" && $urutan != ""){
 											mysql_query("update penggunaweb set isactive=0 where id_pengguna_web='$urutan';");
 										}

										//DI BAGIAN INI DIATUR SESSION UNTUK USER TARUH DI "WHERE"
										$i=1;
										

										if ($hak=="super") {
											$data = mysql_query("select * from penggunadevice where isactive=1;");
										}elseif ($hak=="admin") {
											$data = mysql_query("SELECT * from penggunadevice WHERE id_sto='$id_sto' AND isactive=1;");
										}

										if($pilihnama == ""){
											$data = mysql_query("SELECT * FROM penggunadevice WHERE isactive=1;");
										}else{
											$data = mysql_query("SELECT * from penggunadevice WHERE username_pengguna_device like '%$pilihnama%';");
										}


										function getHakPenggunaWeb($hak){
											if ($hak=="super"){$prev="Superadmin";}
											elseif ($hak=="admin") {$prev="Administrator";}
											elseif ($hak=="call") {$prev="Call Center";}
											return $prev;
										}
$i=1;
										//DI BAGIAN INI DIATUR SESSION UNTUK USER TARUH DI "WHERE"
										
										

										while ($databaru=mysql_fetch_array($data)){
											$baca_index[$i] = $databaru[id_pengguna_device];											
											echo "<tr class='warning'>";
											//echo "<td>".$databaru[$i]."</td>";
											echo "<td>".$i."</td>";
											//echo "<td>".$databaru[id_pengguna_web]."</td>";
											echo "<td>".$databaru[username_pengguna_device]."</td>";
											echo "<td>".$databaru[password_pengguna_device]."</td>";
											//echo "<td>".$databaru[id_sto]."</td>";

											$pilih_team = mysql_query("select nama_team from team where id_team='$databaru[id_team]'");
											$fin_pilih_team = mysql_fetch_array($pilih_team);											
											echo "<td>".$fin_pilih_team[nama_team]."</td>";

											$pilih_sto = mysql_query("select nama_sto from sto where id_sto='$databaru[id_sto]';");
											$fin_pilih_sto = mysql_fetch_array($pilih_sto);											
											echo "<td>".$fin_pilih_sto[nama_sto]."</td>";

/*											$pilih_area = mysql_query("select nama_area	from area where id_area='$databaru[id_area]';");
											$fin_pilih_area = mysql_fetch_array($pilih_area);											
											echo "<td>".$fin_pilih_area[nama_area]."</td>";
*/
											
											echo "<td><a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[username_pengguna_device]','$databaru[password_pengguna_device]','$databaru[id_sto]','$databaru[id_team]','$databaru[id_area]')>Update</td>";
											echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' onClick=setDisable('zzzd','$databaru[id_pengguna_device]');>Disable</td>";
										
											echo "</tr>";
											
											$i++;
											
										}
							?>
						</tbody>
					</table>					