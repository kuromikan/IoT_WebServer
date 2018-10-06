# IoT_WebServer

IoT伺服器端收送資料

透過下列方式初始化mysql root 密碼
<code>
use mysql;
UPDATE user SET Password=PASSWORD('pswd') where USER='root';
GRANT all ON *.* TO root@'localhost' IDENTIFIED BY 'pswd';
FLUSH PRIVILEGES;
</code>

將iot.sql匯入資料庫

接收資料方法
<code>
iot/data.php?temp=溫度&humi=濕度
</code>

