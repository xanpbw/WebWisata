<?php
mysql_connect("localhost","root","");
mysql_select_db("combobox_bertingkat");
$propinsi = $_GET['kota'];
$kota = mysql_query("SELECT id_kelurahan,nm_kelurahan FROM t_kelurahan WHERE id_kecamatan='$kota'");
echo "<option>-- Pilih Kabupaten/Kota --</option>";
while($k = mysql_fetch_array($kota)){
echo "<option value=\"".$k['id_kelurahan']."\">".$k['nm_kelurahan']."</option>\n";
}
?>