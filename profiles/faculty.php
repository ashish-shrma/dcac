<?php
include '_database/database.php';
echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

        $sql = "SELECT `user_id`,`user_prefix`, `user_firstname`, `user_lastname`, `user_papers`, `user_profession`, `user_papers` FROM `user` WHERE 1";
    $result = mysqli_query($database,$sql) or die(mysqli_error()); 

$num =0;
echo"<div class='container' >";
while ($row = mysqli_fetch_array($result))  
{
    
    
    $department= $row["user_papers"];
    
    
        if($department!=$department2){
        
            
             if($num==0)
        {
        echo"<h2>"."Department of ".$department."</h2>";
            $count=0;
        
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Faculty Name</th>
                        <th>Designation</th>
                    </tr>
                </thead>
                <tbody>';
        $num=1;
        
    }
            else
        {    
            echo ' </tbody>
            </table>';
            
            echo"<h2>"."Department of ".$department."</h2>";
            $count=0;
            
            echo '<table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Faculty Name</th>
                        <th>Designation</th>
                    </tr>
                </thead>
                <tbody>';
            }
            
            
            
    }
    
    if($row["user_lastname"]=='lastname'){
        $row["user_lastname"]='';
    }
    
    $id=$row["user_id"];
    $count=$count+1;
   
    echo '<tr>';
    echo "<td>".$count."</td>";
    echo '<td>'.'<a href="faculty-profile.php?id='.$id.'">'.$row["user_prefix"].' '.$row["user_firstname"].
        ' '.$row["user_lastname"].'</a></td>';
    
    echo '<td>'.$row["user_profession"].'</td>' ;
    echo '</tr>';
    $department2=$row["user_papers"];
    
}
echo "</div>";
?>


                  