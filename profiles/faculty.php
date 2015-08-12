<?php
include '_database/database.php';
echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

        $sql = "SELECT `user_id`,`user_prefix`, `user_firstname`, `user_lastname`, `user_papers`, `user_profession`, `user_papers` FROM `user` WHERE 1";
    $result = mysqli_query($database,$sql) or die(mysqli_error()); 

echo "<table>";
while ($row = mysqli_fetch_array($result))  
{
    $department= $row["user_papers"];
    
        if($department!=$department2){
        echo"<h2>"."Department of ".$department."</h2>";
            $count=0;
            
    }
    if($row["user_lastname"]=='lastname'){
        $row["user_lastname"]='';
    }
    $id=$row["user_id"];
    $count=$count+1;
    echo "<tr>";
    echo $count.". "."<a href='faculty-profile.php?id=$id'>".$row["user_prefix"]." ".$row["user_firstname"]." ".$row["user_lastname"]."<br>"."</a>" ;
    echo "</tr>";
    $department2=$row["user_papers"];
    
}
echo "</table>";
?>
