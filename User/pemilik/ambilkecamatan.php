<?php
mysql_connect("localhost","root","");
mysql_select_db("db_wisata");
 
$kota = $_GET['kota'];
$kec  = mysql_query("SELECT id_kelurahan, nm_kelurahan FROM t_kelurahan WHERE id_kecamatan='$kota'");
 
echo "<option>-- Pilih Kecamatan --</option>";
while($k=mysql_fetch_array($kec)){
echo "<option value='".$k['id_kelurahan']."'>".$k['nm_kelurahan']."</option>";
}
?>