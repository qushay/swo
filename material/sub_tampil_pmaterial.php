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
<!-- 											<th>ID Penggunaan Material</th>
											<th>Id Team</th> -->
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
								 
									<tbody>


									<?php
										include("../connect.php");
										$i=1;
 										$pilihnama=$_GET['pilihnama'];

										if($pilihnama==""){
											$data = mysql_query("select pmat.id_penggunaan_material, t.id_team, t.nama_team, pmat.jumlah_ont, pmat.jumlah_roset, pmat.kabel_50, pmat.kabel_75, pmat.kabel_100, pmat.jumlah_duct, pmat.jumlah_flexible_pipe, pmat.createdate, pmat.updatedate, pmat.createby from penggunaanmaterial pmat inner join team t on pmat.id_team=t.id_team order by id_penggunaan_material;");		
										}else{
											$data = mysql_query("select pmat.id_penggunaan_material, t.id_team, t.nama_team, pmat.jumlah_ont, pmat.jumlah_roset, pmat.kabel_50, pmat.kabel_75, pmat.kabel_100, pmat.jumlah_duct, pmat.jumlah_flexible_pipe, pmat.createdate, pmat.updatedate, pmat.createby from penggunaanmaterial pmat inner join team t on pmat.id_team=t.id_team where t.nama_team like '%$pilihnama%' order by pmat.id_penggunaan_material;");	
										}

										//DI BAGIAN INI ADALAH BAGIAN PENGATURAN SESSIONNYA "PAKE WHERE"
										//
										while ($databaru=mysql_fetch_array($data)){
											$baca_index[$i] = $databaru["id_penggunaan_material"];											
											echo "<tr class='warning'>";
											echo "<td>".$i."</td>";
/*											echo "<td>".$databaru["id_penggunaan_material"]."</td>";
											echo "<td>".$databaru["id_team"]."</td>";
*/											echo "<td>".$databaru["nama_team"]."</td>";
											echo "<td>".$databaru["jumlah_ont"]."</td>";
											echo "<td>".$databaru["jumlah_roset"]."</td>";
											echo "<td>".$databaru["kabel_50"]."</td>";
											echo "<td>".$databaru["kabel_75"]."</td>";
											echo "<td>".$databaru["kabel_100"]."</td>";
											echo "<td>".$databaru["jumlah_duct"]."</td>";														
											echo "<td>".$databaru["jumlah_flexible_pipe"]."</td>";
											if($databaru["updatedate"]!=""){
												echo "<td>".$databaru["updatedate"]."</td>";
											}else{
												echo "<td>".$databaru["createdate"]."</td>";
											}

											
											$q_createby = mysql_query("select nama from penggunaweb where id_pengguna_web='$databaru[createby]';");
											$ar_createby = mysql_fetch_array($q_createby);
											echo "<td>".$ar_createby[nama]."</td>";

											echo "<td><a href='#myModalAddMaterial' class='btn btn-small btn-cl' id='filter' data-toggle='modal' onClick=clickAddMaterial('$databaru[id_team]','$databaru[sn_ont]')>Add</td>";
											echo "<td><a href='#myModal' class='btn btn-small btn-primary' id='filter' data-toggle='modal' onClick=setIdValue('$baca_index[$i]','$databaru[jumlah_ont]')>Detail</td>";
											echo "</tr>";
											
											$i++;
											
										}


										?>

									</tbody>
									
								</table>					