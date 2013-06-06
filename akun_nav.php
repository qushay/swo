<?php
	$result = mysql_query("SELECT * FROM penggunaweb WHERE id_pengguna_web='$id_pengguna'");
	$data=mysql_fetch_array($result);
	
?>
	<li class="account-info">
		<h3><?php echo $data['username_pengguna_web']; ?></h3>
		<p>
			<b><a><?php echo $data['nama']; ?></a></b> | 
			<a><?php 
				function getHak($hak){
					if ($hak=="super"){$prev="Superadmin";}
					elseif ($hak=="admin") {$prev="Administrator";}
					elseif($hak=="call"){$prev="Call Center";}
					return $prev;
				}
				echo getHak($data['hak_pengguna_web']); ?></a>
		</p>
	</li>
							
	<li class="account-footer">
		<div class="row-fluid">
		
			<div class="span4 align-right">
				<a class="btn btn-small btn-danger btn-flat" href="../?logout=1">Logout</a>
			</div>
			
		</div>									
	</li>