<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

$daftarhari[] = "Senin";
$daftarhari[] = "Selasa";
$daftarhari[] = "Rabu";
$daftarhari[] = "Kamis";
$daftarhari[] = "Jumat";
$daftarhari[] = "Sabtu";
$daftarhari[] = "Minggu";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>SIA Lembaga Kursus</title>
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
					<li class="active"><a href="dw.php"><i class="fa fa-calendar"></i><span>Data Wisata</span></a></li>
					<li><a href="hapusdw.php"><i class="fa fa-book"></i><span>Hapus Data Wisata</span></a></li>
					<li><a href="about.php"><i class="fa fa-info-circle"></i><span>Informasi Pemilik</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DATA WISATA
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-calendar"></i> DATA WISATA</li>
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
                            <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<a href="dw.php" class="art-button">Kota Bandung</a>
						<a href="dw2.php" class="art-button">Kota Cimahi</a>
						<a href="dw3.php" class="art-button">Kab. Bandung</a>
						<a href="dw4.php" class="art-button">Kab. Bandung Barat</a>
						<?php
							include "sampleC.php";
						?>
                  </table>
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