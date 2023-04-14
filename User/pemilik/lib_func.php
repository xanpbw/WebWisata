


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-1.10.2.min.js"></script>
   <link href="../css/tampilan.css" rel="stylesheet">
</head>

<body>
<?php 
    function koneksi() {
        
         $host = "localhost";
	       $user="root";
         $password="";
         $database="db_wisata";
        
    	
    	$conn = mysql_connect($host, $user, $password) or die ("Tidak bisa terkoneksi dengan server database");
        $select_db = mysql_select_db($database, $conn);
        if(!$select_db) die("Tidak bisa terkoneksi");
    	return $conn;
    }
?>
  
</body>
</html>

