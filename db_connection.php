<?php

$username="root";
$password="";
$db_name="faculty1";
$host="localhost";
$con=  mysqli_connect($host, $username, $password) or die("not connected");
$db=  mysqli_select_db($con,$db_name) or die("no db is selected");

