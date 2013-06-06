<?php
session_start();
include 'domain.php';
if (isset($_POST['username'])&&isset($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	include("connect.php");
	$query="SELECT * FROM penggunaweb WHERE username_pengguna_web='$username' AND password_pengguna_web='$password' AND isactive='1'";
	$result=mysql_query($query);
	$no_of_rows = mysql_num_rows($result);
    if ($no_of_rows > 0) {
        $data = mysql_fetch_array($result);
        $_SESSION['username']=$username;
        $_SESSION['id_pengguna_web']=$data['id_pengguna_web'];
        $_SESSION['id_sto']=$data['id_sto'];
        $_SESSION['hak']=$data['hak_pengguna_web'];
	    header('Location: main/');
        
    }
}
if (isset($_GET['logout'])){
	
    header('Location: '.$domain);
	unset($_SESSION['username']);
	unset($_SESSION['id_sto']);
	unset($_SESSION['hak']);
	session_destroy();
}

if (!isset($_SESSION['username'])){
	require "login.html";
}else {
	header('Location: main/');
	
}

?>