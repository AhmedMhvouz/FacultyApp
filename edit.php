<?php

#This page edits the logged in user profile. user must be logged in to be able to edit his data
#Without login, you will not be able to run this page

session_start();
$error="";
require_once './db_connection.php';
if(isset($_SESSION['username'])){
   
$user1= $_SESSION['username'];
$pass1= $_SESSION['password'];
    
     $query="select * from student where username='$user1' and password='$pass1';";
    $result=  mysqli_query($con,$query);
    if($result){
        if(mysqli_num_rows($result)>0){
          while($row=  mysqli_fetch_assoc($result)){
            $user2=$row['username'];
            $pass2=$row['password'];
            $id=$row['id'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            
            
          }
}
    }
}
if(isset($_POST['sub'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    
    $query="update student set id='$id',username='$username',password='$password',fname='$fname',lname='$lname'"
            . "where id='$id';";
    $result=  mysqli_query($con,$query);
    if($result){
        echo 'dddddddd';
        $error.="Data updated successfully!";
    }
}
?>
<html>
    <body>
        <form name="form1" action="edit.php" method="post">
            <table>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        <input type="text" name="id" value="<?php echo$id;?>">
                    </td>
                </tr>
                                <tr>
                    <td>
                       UserName
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo$user2;?>">
                    </td>
                </tr>
                                <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="text" name="password" value="<?php echo$pass2;?>">
                    </td>
                </tr>
                                <tr>
                    <td>
                        First Name
                    </td>
                    <td>
                        <input type="text" name="fname" value="<?php echo$fname;?>">
                    </td>
                </tr>
                                <tr>
                    <td>
                        Last Name
                    </td>
                    <td>
                        <input type="text" name="lname" value="<?php echo$lname;?>">
                    </td>
                </tr>
                                <tr>
                    <td>
                        <p color="red"><?php echo $error;?></p>
                    </td>
                    <td>
                        <input type="submit" name="sub" value="Update">
                    </td>
                </tr>
                
            </table>
        </form>
    </body>
</html>
