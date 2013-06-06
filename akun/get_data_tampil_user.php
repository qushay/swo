<?php


if(isset($_GET['id'])){ 
	$id=$_GET['id'];
}

include("connect.php");

echo "TES BRO";
function getUpdatePenggunaWeb($id){
	$q_get_penggunaweb = mysql_query("select nama,username_pengguna_web, password_pengguna_web from penggunaweb where id_pengguna_web=".$id);
	$rows=mysql_fetch_array($q_get_penggunaweb);
	$nama = $rows["nama"];
	echo '<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-circle"></i></button>
												<h3 id="myModalLabel">Edit Akun</h3>
											</div>
											<div class="modal-body">
											<?
												
											?>
											<form method="post" action="updateak.php" name="updatematForm" id="updatematForm"/>
												<fieldset>
													
													
													<label>Id Pengguna Web</label>
													<input type="text" class="span8" placeholder="Input Id Pengguna Web" name="id_pengguna_web" id="id_pengguna_web" value="'.$id.'" readonly/>
													
													<label>Nama</label>
													<input type="text" class="span8" placeholder="Input Nama Pengguna Web" name="nama_tambah" id="nama_tambah" value="'.$rows["nama"].'" />											
															
													<label>Username</label>
													<input type="text" class="span8" placeholder="Input Username" name="username_pengguna_web" id="username_pengguna_web" value="'.$rows["username_pengguna_web"].'" />
													
													
													<label>Password</label>
													<input type="text" class="span8" placeholder="Input Password Pengguna Web" name="password_pengguna_web" id="password_pengguna_web" value="'.$rows["password_pengguna_web"].'"/>
													
													<label>Pilih STO</label>
													<select class="cselect span8" style="width:200px" data-placeholder="Select category..." name="id_sto2" id="id_sto2">
													<option />
													</select>
												</fieldset>
											</form>
		';
}

getUpdatePenggunaWeb($id);

?>