<?php
require_once './db_connection.php';
  echo '<font color="red"><h2>SEARCH USING FIRST OR LAST NAME</h2></font>';
if(isset($_POST['sub'])){

                   $key=trim($_POST['search']);
                   $sql="select * from student where fname like '%$key%' or lname like '%$key%'";
                   $result5=  mysqli_query($con,$sql);
                   $i=0;
                   $num2=  mysqli_num_rows($result5);
                  if($num2>0){
                    
echo '<div style="height:400px;width:570px;border:solid 2px orange;overflow:scroll;overflow-x:scroll;overflow-y:scroll;">';
          echo ' <table cellspacing="2" style="height:400px;width:600px border:solid 2px orange">';
                echo'<form action="Showallstudents.php" method="post">';
                    echo'<tr bgcolor="FF0033">';
                       echo' <td>ID</td><td>username</td><td>password</td><td>first name</td<td>last name</td><td>department</td><td>Delete</td><td>update</td>';
                   echo' </tr>';
                   while($row=  mysqli_fetch_assoc($result5)){
                        $color='00CC33';
                       if($i%2==0){
                           $color='FFCCFF';
                       }
                       echo' <tr bgcolor='.$color.'><td>'.$row['id'].'</td><td>'
                               .$row['username'].'</td><td>'
                               .$row['password'].'</td><td>'
                               .$row['fname'].'</td<td>'
                               .$row['lname'].'</td><td>'
                               .$row['dept_id'].'</td>'
                               .'<td><a href="delete.php?id=' . $row['id'].'">Delete Member</a></td>'
                               .'<td><a href="update.php?id='.$row['id'].'">update</a></td>'
                               . '<tr>';
                       $i++;
                   }
                  }
                  else{
                      echo '<font color="red"><h3>no results to show try again using different keywords</h3></font>';
                  }
echo'</form>';
echo'</table>';
echo'</div>';
}
?>
<html>
    <body>
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="Enter search" required="required"> 
            <input type="submit" name="sub" value="search">
            
        </form>
    </body>
</html>