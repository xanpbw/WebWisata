<?php
session_start();
include "koneksi.php";

// Notif Error
$Err = "";
if(isset ($_GET ["Err"]) && !empty ($_GET ["Err"])){
	switch ($_GET ["Err"]){
		case 1:
			$Err = "Username dan Password Kosong";
		break;
		case 2:
			$Err = "Username Kosong";
		break;
		case 3:
			$Err = "Password Kosong";
		break;
		case 4:
			$Err = "Password Salah";
		break;
		case 5:
			$Err = "Username dan Password Salah";
		break;
		case 6:
			$Err = "Maaf, Terjadi Kesalahan";
		break;
	}
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.3.0.60858 -->
    <meta charset="utf-8">
    <title>Login pengguna</title>
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
<div class="art-shapes">
</div>

   <nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../" class="active">Home</a></li></ul> 
	<ul class="art-hmenu"><li><a href="#" class="active">Login</a></li></ul> 
    </nav>
	
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader">Login pengguna</h2>
                <form action="vl_user.php" method="post">                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				<p style="text-align: center;">Username : &nbsp;<input type="text" name="Username" maxlength="30" ></p>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
				<p style="text-align: center;">&nbsp;Password :&nbsp;<input type="Password" name="Password" maxlength="255" ></p>
				<span class="form-control-feedback"><i class="fa fa-unlock"></i></span>
				
				<p style="text-align: center;"><a href="#">Lupa Password?</a></p><p style="text-align: center;">&nbsp;
				
				<button class="art-button">Login</button>&nbsp;
				<a href="signup.php" class="art-button">Sign Up</a>&nbsp;<br></p></div>
				<p style="text-align: center;"><font style="color:red;"><?php echo $Err ?></font></p>
				</form>

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
    <p class="art-page-footer">
    </p>
</div>


</body></html>