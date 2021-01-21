<?php
$host='localhost';
$dbuser='root';
$dbpass='root';
$dbname='word';
$con=mysqli_connect($host,$dbuser,$dbpass);
mysqli_select_db($con,$dbname);
mysqli_set_charset($con,'utf8');