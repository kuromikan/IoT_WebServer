<?php
$temp=$_GET['temp'];
$humi=$_GET['humi'];
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',); 
$dbh = new PDO('mysql:host=localhost;dbname=iot',"root","pswd",$options);
$sql="INSERT INTO `dht` (`sn`, `temperature`, `humidity`, `date`) VALUES (NULL, '".$temp."', '".$humi."', CURRENT_TIMESTAMP)";
$dbh->query($sql);
$dbh=null;
?>