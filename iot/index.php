<!DOCTYPE html>
<html lang="en">
<head>
<?php
header("refresh:5");
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
?>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
}

/* Style the topnav links */
.topnav h2 {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Style the content */
.content {
    background-color: #ddd;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

/* Style the footer */
.footer {
    background-color: #f1f1f1;
    padding: 10px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', '');
      data.addColumn('number', '溫度');
	  data.addColumn('number', '濕度');
      data.addRows([
	  <?php
	  foreach($dht_all as $value) {
		  echo "['";
		  echo $value['date'];
		  echo "',";
		  echo $value['temperature'];
		  echo ",";
		  echo $value['humidity'];
		  echo "],";
	  }
	  
	  ?>
      ]);

      var options = {
        chart: {
          title: '溫濕度歷史紀錄',
          subtitle: ''
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));
      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
</head>
<body>

<div class="topnav">
  <h2>溫溼度感測</h2>
</div>

<div class="content">
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Type</th>
      <th>平均</th>
      <th>最大</th>
      <th>最小</th>
    </tr>
    <tr>
      <td>溫度</td>
      <td><?php echo $temp_all[0][0]; ?></td>
      <td><?php echo $temp_all[0][1]; ?></td>
	  <td><?php echo $temp_all[0][2]; ?></td>
    </tr>
    <tr>
      <td>濕度</td>
      <td><?php echo $humi_all[0][0]; ?></td>
      <td><?php echo $humi_all[0][1]; ?></td>
	  <td><?php echo $humi_all[0][2]; ?></td>
    </tr>
  </table>
</div>
  
</div>
<div id="line_top_x"></div>
<div id="line_top_y"></div>
<div class="footer">
</div>

</body>
</html>
