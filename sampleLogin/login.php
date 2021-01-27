<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#34495e">
	<div id="main-wrapper">
	<center><h2>PET CARE SOLUTIONS</h2></center><br>
	<center><h2>Login Form</h2></center>
		<div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		</div>
		<form action="login.php" method="post">
		
			<div class="inner_container">
				<label ><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" style="background-color: #27ae60; padding: 15px; text-align: center; width: 30%; border-radius: 8px; margin: 10px 150px; font-size: 0.95em" type="submit">Login</button>
				<a href="register.php"><button type="button" style="background-color: #2980b9; padding: 15px; text-align: center; width: 50%; border-radius: 8px; margin: 10px 110px; font-size: 0.95em" class="register_btn">Not a User? Register</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$password = md5($password);
				$query = "select * from user where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: ../home.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>
