<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Wisata Bandung City</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="sidebar-mini wysihtml5-supported skin-green-light">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
				<li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
					<li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li><a href="dw.php"><i class="fa fa-calendar"></i><span>Data Wisata</span></a></li>
					<li><a href="hapusdw.php"><i class="fa fa-book"></i><span>Hapus Data Wisata</span></a></li>
					<li class="active"><a href="about.php"><i class="fa fa-info-circle"></i><span>Informasi Pemilik</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Informasi Pemilik Wisata
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-info-circle"></i> Informasi Pemilik Wisata</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php
   
  include("koneksi.php");    
  $sql  = "select * from t_pemilik where Id_User ='".$_SESSION['Id_User']."'";
  $aksi = mysql_query($sql);
         
  $no = 1;
  while($data = mysql_fetch_array($aksi)):?>
 <center> 
 <img src="../images/<?php echo $data['foto']; ?>" border="0" height="200" width="150">
 </center><br>
 <font size="5">
<table align="center" border='0'>
<tr>
       <?php 
	   echo "<td>ID KTP</td><td>:  ".$data['idktp']."</td><tr>";
	   echo "<td>Nama</td><td>:  ".$data['nama']."</td><tr>";
	   echo "<td>Email</td><td>:  ".$data['email']."</td><tr>";
	   echo "<td>Tempat Lahir</td><td>:  ".$data['tempat_lahir']."</td><tr>";
	   echo "<td>Tanggal Lahir</td><td>:  ".$data['tgl_lahir']."</td><tr>";
	   echo "</table></font>";
	   ?> 	  
  <?php 
  $no++;
  endwhile;
  ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
	<?php
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
