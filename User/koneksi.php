<?php

	 $host = "localhost";
	 $usr="root";
     $pwd="";
     $database="db_wisata";
 
     $connection=mysql_connect($host, $usr, $pwd);
     if (!$connection) {
          die('Not connected : ' . mysql_error());
          }
 
     // Memilih database MySQL yang aktif
     $db_selected = mysql_select_db($database, $connection);
     if (!$db_selected) {
          die ('Can\'t use db : ' . mysql_error());
          }
?>
