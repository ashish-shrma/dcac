<!doctype html>
<?php include '_database/database.php' ;?>
   <?php include 'controllers/base/css.php' ?>

    <?php include 'controllers/base/font.php' ?>
<html>
<head>
<title>Login</title>
</head>
<body>
<h3>Admin Login</h3>
<div class="row container main">
<form action="" method="POST">
<label for="">Username</label>
 <input class="form-control" type="text" placeholder="Username" name="user"><br />
<label for="">Password</label> 
<input class="form-control" placeholder="Password" type="password" name="pass"><br />	
<input type="submit" value="Login" class="btn btn btn-primary ladda-button" name="submit" />
</form>
</div>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('dcac') or die("cannot select DB");

	$sql="SELECT * FROM adminlogin WHERE username='$user' AND password='$pass'";
    $query=mysql_query($sql) or die(mysqli_error()); 
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user']=$user;

	/* Redirect browser */
	header("Location: member.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>