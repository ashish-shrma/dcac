<?php
    ini_set("display_errors",1);
    session_start();
    $temp=$_SESSION['user_username'];
    if(isset($_POST)){
        require '../_database/database.php';
        $Destination = '../userfiles/background-images';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default-background.jpg';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql1="UPDATE user SET user_backgroundpicture='$BackgroundNewImageName' WHERE user_username = '$temp'";
        $sql2="INSERT INTO user (user_backgroundpicture) VALUES ('$BackgroundNewImageName') WHERE user_username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM user WHERE user_username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                mysqli_query($database,$sql1)or die(mysqli_error($database));
                header("location:../edit-profile.php?user_username=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$temp");
        }
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE user SET user_avatar='$NewImageName' WHERE user_username = '$temp'";
        $sql6="INSERT INTO user (user_avatar) VALUES ('$NewImageName') WHERE user_username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM user WHERE user_username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($database,$sql5)or die(mysqli_error($database));
                header("location:../edit-profile.php?user_username=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql6)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$temp");
        }
        
        $Destination = '../userfiles/profiles';
        if(!isset($_FILES['Profile']) || !is_uploaded_file($_FILES['Profile']['tmp_name'])){
            $NewFileName= 'default.docx';
            move_uploaded_file($_FILES['Profile']['tmp_name'], "$Destination/$NewFileName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['Profile']['name']));
            $ImageType = $_FILES['Profile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewFileName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['Profile']['tmp_name'], "$Destination/$NewFileName");
        }
        $sql7="UPDATE user SET user_profile='$NewFileName' WHERE user_username = '$temp'";
        $sql8="INSERT INTO user (user_profile) VALUES ('$NewFileName') WHERE user_username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM user WHERE user_username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['Profile']['name'])){
                mysqli_query($database,$sql7)or die(mysqli_error($database));
                header("location:../edit-profile.php?user_username=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql8)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$temp");
        } 
        $user_firstname=$_REQUEST['user_firstname'];
        $user_lastname=$_REQUEST['user_lastname'];
        $user_email=$_REQUEST['user_email'];
        $user_password=$_REQUEST['user_password'];
        $user_profession=$_REQUEST['user_profession'];
        $user_address=$_REQUEST['user_address'];
        $user_address2=$_REQUEST['user_address2'];
        $user_shortbio=$_REQUEST['user_shortbio'];   
        $user_longbio=$_REQUEST['user_longbio'];   
        $user_dob=$_REQUEST['user_dob'];
        $user_gender=$_REQUEST['user_gender'];
        $user_country=$_REQUEST['user_country'];
        $user_website=$_REQUEST['user_website'];
        $user_contact=$_REQUEST['user_contact'];
        $user_papers=$_REQUEST['user_papers'];
        $user_prefix=$_REQUEST['user_prefix'];
        $sql3="UPDATE user SET user_firstname='$user_firstname',user_lastname='$user_lastname',user_profession='$user_profession',user_address='$user_address',user_address2='$user_address2',user_email='$user_email',user_password='$user_password',user_shortbio='$user_shortbio',user_longbio='$user_longbio',user_dob='$user_dob',user_gender='$user_gender',user_country='$user_country',user_website='$user_website',user_contact='$user_contact',user_papers='$user_papers',user_prefix='$user_prefix' WHERE user_username = '$temp'";
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$temp&request=profile-update&status=success");
    }    
?>