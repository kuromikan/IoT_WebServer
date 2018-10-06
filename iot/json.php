<?php
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',); 
$dbh = new PDO('mysql:host=localhost;dbname=iot',"root","pswd",$options);
$dht_all=array();$temp_all=array();$humi_all=array();
$sql="select * from `dht`";
foreach($dbh->query($sql) as $row) 
{
	$dht_all[]=$row;
}
$sql="SELECT avg(`temperature`),max(`temperature`),min(`temperature`) FROM `dht`";
foreach($dbh->query($sql) as $row) 
{
	$temp_all[]=$row;
}
$sql="SELECT avg(`humidity`),max(`humidity`),min(`humidity`) FROM `dht`";
foreach($dbh->query($sql) as $row) 
{
	$humi_all[]=$row;
}
$dbh=null;
$all=array();
$all[]=$dht_all;
$all[]=$temp_all;
$all[]=$humi_all;
$myJSON = json_encode($all);

echo $myJSON;
?>