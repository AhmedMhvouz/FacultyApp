<?php

require_once './db_connection.php';
$user_id=$_GET['id'];
$sql="delete from student where id='$user_id';";
$resultt=  mysqli_query($con,$sql);
if($resultt){
    header("location:./Showallstudents.php");
}
?>