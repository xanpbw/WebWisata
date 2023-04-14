<?php
 
     // Parsing Karakter-Karakter Khusus
     function parseToXML($htmlStr)
     {
          $xmlStr=str_replace('<','<',$htmlStr);
          $xmlStr=str_replace('>','>',$xmlStr);
          $xmlStr=str_replace('"','"',$xmlStr);
          $xmlStr=str_replace("'",'"',$xmlStr);
          $xmlStr=str_replace("&",'&',$xmlStr);
          return $xmlStr;
     }
 
     // Menghubungkan Koneksi dengan server MySQL
     $host = "localhost";
	 $username="root";
     $password="";
     $database="db_wisata";
 
     $connection=mysql_connect($host, $username, $password);
     if (!$connection) {
          die('Not connected : ' . mysql_error());
          }
 
     // Memilih database MySQL yang aktif
     $db_selected = mysql_select_db($database, $connection);
     if (!$db_selected) {
          die ('Can\'t use db : ' . mysql_error());
          }
 
     // Memilih semua baris pada tabel 'marker'
     $query = "SELECT * FROM dt_marker WHERE 1";
     $result = mysql_query($query);
     if (!$result) {
          die('Invalid query: ' . mysql_error());
          }
	 // Memilih semua baris pada tabel 'marker'
     $query1 = "SELECT * FROM dt_marker WHERE 1";
     $result1 = mysql_query($query1);
     if (!$result1) {
          die('Invalid query: ' . mysql_error());
          }
 
     // Header File XML
     header("Content-type: text/xml");
 
     // Parent node XML
     echo '<markers>';
 
     // Iterasi baris, masing-masing menghasilkan node-node XML
     while ($row = @mysql_fetch_assoc($result)){
 
          // Menambahkan ke node dokumen XML
          echo '<marker ';
          echo 'name="' . parseToXML($row['name']) . '" ';
          echo 'address="' . parseToXML($row['address']) . '" ';
          echo 'lat="' . $row['lat'] . '" ';
          echo 'lng="' . $row['lng'] . '" ';
          echo 'category="' . $row['category'] . '" ';
          echo '/>';
     }
 
     // Akhir File XML (tag penutup node)
     echo '</markers>';
 
?>