<?php include 'components/authentication.php' ?>     
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>     
<?php include 'controllers/base/style.php' ?>     
<?php 
    if($_GET["request"]=="profile-update" && $_GET["status"]=="success"){
        $dialogue="Your profile update was successful! ";
    }
    else if($_GET["request"]=="profile-update" && $_GET["status"]=="unsuccess"){
        $dialogue="Your profile update was not at all successful! ";
    }
    else if($_GET["request"]=="login" && $_GET["status"]=="success"){
        $dialogue="Welcome back again! ";
    }
?>
    <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }								
        });
    </script>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12">
         <div class="bg-danger">
          <?php if($rws['user_password']==default_password)
    {echo '<h4 class="text-danger fixed-bottom">Your password is set to the default and your account is open to intrusion, you really should fix this by <a href="edit-profile.php">setting a new password</a> </h4>';}
      ?>
           </div>
            <h1 class="text-center">Welcome to your profile</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <ul class="nav text-center">
                <li><a href="my-profile.php">View Your Profile</a></li>
                <li><a href="edit-profile.php">Edit Your Profile</a></li>
                <li><a href="all-users.php">View all users</a></li>
                <li><a href="components/logout.php">Log Out</a></li>
            </ul>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
