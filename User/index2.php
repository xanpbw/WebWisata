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
<html>
<head>
  <meta charset="utf-8">
  <title>Akademik Kursus</title>

	<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="favicon.jpg">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fa/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
    <div class="login-logo">
    	<b>Akademik Kursus</b>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <b><p class="login-box-msg">Login Form</p></b>
      <form action="vl_user.php" method="post">
      	<div class="form-group has-feedback">
        	<input type="text" name="Username" class="form-control" placeholder="Username" maxlength="30" />
          <span class="form-control-feedback"><i class="fa fa-user"></i></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="Password" class="form-control" placeholder="Password" maxlength="255" />
          <span class="form-control-feedback"><i class="fa fa-unlock"></i></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div><!-- /.col -->
        	<div class="col-xs-4">
            <button type="submit" class="btn btn-success">Login<i class="fa fa-sign-in"></i></button>
          </div><!-- /.col -->
        </div>
		<br>
		<center><font style="color:red;"><?php echo $Err ?></font></center>
		</br>
    </form>
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
