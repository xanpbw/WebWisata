<?php
session_start();
include "koneksi.php";

$Username = $_POST["Username"];
$Password = $_POST["Password"];

$query = mysql_query("SELECT * FROM `pengguna` WHERE `Username`='$Username' AND `Password`='$Password'");

// Validasi Login
if ($_POST){

	$queryuser = mysql_query("SELECT * FROM `pengguna` WHERE `Username`='$Username'");

	$pengguna = mysql_fetch_array($queryuser ,MYSQL_ASSOC);

	if($pengguna){
			if ($pengguna["Password"]){

				$_SESSION["Username"] 			= $pengguna["Username"];
				$_SESSION["Password"] 			= $pengguna["Password"];
				$_SESSION["Id_Usergroup_User"] 	= $pengguna["Id_Usergroup_User"];
				$_SESSION["Id_User"] 			= $pengguna["Id_User"];
				$_SESSION["Login"] 				= true;

				if ($_SESSION["Id_Usergroup_User"] == 1){
					header ("Location: administrator/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 2){
					header ("Location: adminpariwisata/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 3){
					header ("Location: pemilik/index.php");
					exit();
				}
				else{
					header("Location :pagenotfound.php");
					exit();
				}
			}
			else
			{
				header ("Location: index.php?Err=4");
				exit();
			}
	}
	else if (empty ($Username) && empty ($Password)){
		header ("Location: index.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: index.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: index.php?Err=3");
		exit();
	}
	else{
		header ("Location: index.php?Err=5");
		exit();
	}
}

?>
