<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.3.0.60858 -->
    <meta charset="utf-8">
    <title>Pesan</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>


</head>
<body>
<div id="art-main">
<header class="art-header">
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                                
<div class="art-postcontent art-postcontent-0 clearfix"><p>&nbsp;&nbsp;PESAN</p>
<?php

include "koneksi.php";
include "pemilik/koneksi.php";

$Id_Usergroup_User	= 3;
$nama			= $_POST["nama"];
$ktp			= $_POST["ktp"];
$Username		= $_POST["email"];
$Password		= $_POST["pass"];
$alamat			= $_POST["alamat"];
$lahir			= $_POST["lahir"];
$day			= $_POST["day"];
$mon			= $_POST["month"];
$yea			= $_POST["year"];
$Password_Hash	= password_hash($Password, PASSWORD_DEFAULT);

$add = mysql_query("INSERT INTO pengguna (Id_Usergroup_User, Username, Password) VALUES ('$Id_Usergroup_User', '$Username', '$Password_Hash')");

	$query1 = "SELECT * FROM pengguna WHERE Username='".$Username."'";
	$sql1 = mysqli_query($connect, $query1); 
	while($data = mysqli_fetch_array($sql1)){
		$iduser = $data['Id_User'];
	} 

if($_POST['signup']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$namaf = $_FILES['file']['name'];
			$x = explode('.', $namaf);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'images/'.$namaf);
					$query = mysql_query("INSERT INTO t_pemilik (idktp, nama, email, password, tempat_lahir, tgl_lahir , foto, Id_User) VALUES ('$ktp', '$nama', '$Username', '$Password','$lahir','$yea-$mon-$day','$namaf','$iduser')");
					if($query){
						echo '<center>BERHASIL DAFTAR</center>';
					}else{
						echo '<center>GAGAL MENGUPLOAD GAMBAR</center>';
					}
				}else{
					echo '<center>UKURAN FILE TERLALU BESAR</center>';
				}
			}else{
				echo '<center>EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</center>';
			}
		}
		
header("Location: signuppesan.php");
?>
<center><a href="index.php" class="art-button">Kembali</a></center>
</div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 34%">
        <br>
    </div><div class="art-layout-cell layout-item-0" style="width: 31%">
        <p style="float: left; text-align: left;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Copyright © 2018. Kel 2 ATOL-1</p>
    </div><div class="art-layout-cell layout-item-0" style="width: 35%">
        <p style="float: right; text-align: left;"><a href="#">About Us</a>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</p>
    </div>
    </div>
</div>

</footer>

    </div>
</div>


</body></html>