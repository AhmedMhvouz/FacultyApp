<?php

#This is the entry point for the application

    session_start();
    require_once './db_connection.php';
    echo '<font color="red"><h2>LOG IN PAGE</h2></font>';
    $error="";
    if(isset($_POST['sub'])){
      
        $username=$_POST['username'];
        $password=$_POST['password'];
    
        $query="select * from student where username='$username' and password='$password';";
        $result=  mysqli_query($con,$query);
        if($result){
            if(mysqli_num_rows($result)>0){
              while($row=  mysqli_fetch_assoc($result)){
                $_SESSION['username']=$row['username'];
                $_SESSION['password']=$row['password'];
                $_SESSION['id']=$row['id'];
                $_SESSION['fname']=$row['fname'];
                $_SESSION['lname']=$row['lname'];
                $_SESSION['dept_id']=$row['dept_id'];
              }
              if($username=='admin'&&$password=='admin'){
                    header("location:adminHome.php");
                }
                else{
                header("location:home.php");
                }
                
            }
            else{
            $error.="Invalid username or password";
        }
        }
        
    }



?>
<html>
    <body>
        <table>
            <form action="index.php" name="form1" method="post"  >
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <font color="red"><?php echo $error;?></font>
                    </td>
                </tr>
            <tr>
                <td>
                    UserName
                    <br><br>
                </td>
                <td>
                    <input type="text" name="username" placeholder="Enter username" required="required"
                           value="<?php if(isset($username))echo$username;?>" >
                    <br><br>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                    <br><br>
                </td>
                <td>
                    <input type="text" name="password" placeholder="Enter password" required="required"
                           value="<?php if(isset($password))echo $password;?>">
                    <br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="sub" value="login">
                </td>
            </tr>
            
            </form>
        </table>
    </body>
</html>