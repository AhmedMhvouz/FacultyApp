<?php

require_once './db_connection.php';;
echo '<font color="red"><h2>SHOW USER DETAILS</h2></font>';
echo '<div style="height:400px;width:570px;border:solid 2px orange;overflow:scroll;overflow-x:scroll;overflow-y:scroll;">';
          echo ' <table cellspacing="2" style="height:400px;width:600px border:solid 2px orange">';
                echo'<form action="Showallstudents.php" method="post">';
                    echo'<tr bgcolor="FF0033">';
                       echo' <td>ID</td><td>username</td><td>password</td><td>first name</td<td>last name</td><td>department</td><td>Delete</td><td>update</td>';
                   echo' </tr>';
                   $sql="select * from student";
                   $result5=  mysqli_query($con,$sql);
                   $i=0;
                  
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
echo'</form>';
echo'</table>';
echo'</div>';
?>
<html>
    <body>


    </body>
</html>