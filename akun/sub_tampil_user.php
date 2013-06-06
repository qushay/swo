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
											$data = mysql_query("SELECT * from penggunaweb WHERE isactive=1;");
										}elseif ($hak=="admin") {
											$data = mysql_query("SELECT * from penggunaweb WHERE hak_pengguna_web='call' AND id_sto='$id_sto' AND isactive=1;");
										}

										if($pilihnama == ""){
											$data = mysql_query("SELECT * FROM penggunaweb WHERE isactive=1;");
										}else{
											$data = mysql_query("SELECT * from penggunaweb where username_pengguna_web like '%$pilihnama%' AND isactive=1;");
										}


										function getHakPenggunaWeb($hak){
											if ($hak=="super"){$prev="Superadmin";}
											elseif ($hak=="admin") {$prev="Administrator";}
											elseif ($hak=="call") {$prev="Call Center";}
											return $prev;
										}
										while ($databaru=mysql_fetch_array($data)){
											$baca_index[$i] = $databaru[id_pengguna_web];											
											echo "<tr class='warning'>";
											//echo "<td>".$databaru[$i]."</td>";
											echo "<td>".$i."</td>";
											//echo "<td>".$databaru[id_pengguna_web]."</td>";
											echo "<td>".$databaru[username_pengguna_web]."</td>";
											echo "<td>".$databaru[password_pengguna_web]."</td>";
											//echo "<td>".$databaru[id_sto]."</td>";

											$pilih_sto = mysql_query("select id_sto, nama_sto from sto where id_sto='$databaru[id_sto]';");
											$fin_pilih_sto = mysql_fetch_array($pilih_sto);
											echo "<td>".$fin_pilih_sto[nama_sto]."</td>";
											echo "<td>".getHakPenggunaWeb($databaru[hak_pengguna_web])."</td>";
											echo "<td>".$databaru[nama]."</td>";

											
											echo "<td><a href='#myModalEditUser' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[username_pengguna_web]','$databaru[password_pengguna_web]','$databaru[id_sto]','$databaru[hak_pengguna_web]','$databaru[nama]')>Update</td>";
											//echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' onClick=alert('$baca_index[$i]'+'kanan');>Disable</td>";
											echo "<td><a href='#' class='btn btn-small btn-danger' id='filter' onClick=setDisable('zzzd','$databaru[id_pengguna_web]');>Disable</td>";
											
											//echo "<td><button class='icon-arrow-right' onClick=alert('$baca_index[$i]'+'kanan');></td>";
											//Mengubah Content tabel
											//echo "<td><button class='icon-ok' id='filter' onClick=loadXMLDoc('Danu');></i></td>";
											echo "</tr>";
											
											$i++;
											
										}
							?>
						</tbody>
					</table>					