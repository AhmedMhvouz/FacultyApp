<?php

#Note: User must be logged in in order to be able to add new student, so the start point for this application is Login.php page,
#Without login, you will not be able to run this page

session_start();
require_once './db_connection.php';
echo '<font color="red"><h2>ADD NEW STUDENT</h2></font>';
$message3="";
//echo '<a href="showallstudents.php">showallstudents</a>';
if(isset($_SESSION['username'])){
if(isset($_POST['sub'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dept=$_POST['dept'];
    $sql="insert into student values('$id','$username','$password','$fname','$lname','$dept');";
    $resultsql=  mysqli_query($con,$sql);
    if($resultsql){
       echo "Data inserted sucessfully";
       $message3="Data inserted sucessfully";
    }
 else {
        echo 'Incorrect data';
    }
}
}
?>
<HTML>
    <body>
        <form action="Addstudent.php" method="post">
            <table>
                <tr>
                    <td></td>
                    <td><?php if (isset($_POST['sub']))
                            echo $message3; 
                    ?></td>
                </tr>
                      
                <tr>
                    <td>ID</td>
                    <td><INPUT type="text" name="id" placeholder="Enter ID" required="required"></td>
                </tr>
                                <tr>
                    <td>UserName</td>
                    <td><INPUT type="text" name="username" placeholder="Enter Username" required="required"></td>
                </tr>
                                <tr>
                    <td>Password</td>
                    <td><INPUT type="text" name="password" placeholder="Enter password" required="required"></td>
                </tr>
                                <tr>
                    <td>First Name</td>
                    <td><INPUT type="text" name="fname" placeholder="Enter First Name" required="required"></td>
                </tr>
                                <tr>
                    <td>Last Name</td>
                    <td><INPUT type="text" name="lname" placeholder="Enter last name" required="required"></td>
                </tr>
                                <tr>
                    <td>select department</td>
                    <td><select name="dept" required="reqquired">
                            <OPTION  selected="selected">select  department</OPTION>
                            <OPTION value="1">cs</OPTION>
                            <OPTION value="2">is</OPTION>
                            <OPTION value="3">it</OPTION>
                        </select></td>
                </tr>
                 </tr>
                                <tr>
                                    <td><INPUT type="submit" name="sub" value="ADD"></td>
                                    <td><INPUT type="reset" name="rest" value="REST"></td>
                </tr>
            </table>
        </form>
    </body>
</HTML>