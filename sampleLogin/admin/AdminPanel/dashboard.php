<?php
	session_start();
	if(!$_SESSION['isLoggedin']) {
  		header("location: ../index.php"); 
  		die(); 
	}
	require_once('../../dbconfig/config.php');
	$username = $_SESSION['username'];
	$query = "select * from admin where username='$username'";
    //echo $query;
    $query_run = mysqli_query($con,$query);
    //echo mysql_num_rows($query_run);
    if($query_run)
    {
        if(mysqli_num_rows($query_run)>0)
        {
        
        $_SESSION['username'] = $username;
        }
        else
        {
            echo '<script type="text/javascript">alert("Session Timed out. Please log in again.")</script>';
            header("location: ../index.php");
        }
    }
	//phpinfo();
	$query = "select * from user";
	$result = mysqli_query($con,$query);
	$num_rows = mysqli_num_rows($result);
?>

<html>
<head>
	<title>AdminPannel</title>
	<link rel="shortcut icon" href="images/admin.png" />

	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<!-- JavaScript files -->
	<script type="text/javascript" src="scripts/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="scripts/app.js"></script>
</head>

<body>
	<div id="header">
		<div class="logo"><a href="#">Admin<span>Pannel</span><img src="images/admin.png"></a></div>
	</div>

	<a class="mobile" href="#"><img src="images/menu.png"></a>

	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a href="#"><img src="images/user.png"> Hi! <?php echo $_SESSION['username']; ?></a></li>
				<li><a class="selected" href="dashboard.php"><img src="images/dashboard.png"> Dashboard</a></li>
				<li><a href="users.php"><img src="images/user.png"> Users</a></li>
				<li><a href="#"><img src="images/issues.png"> Issues</a></li>
				<li><a href="#"><img src="images/friends.png"> Friends</a></li>
				<li><a href="#"><img src="images/search.png"> Search</a></li>
				<li><a href="#"><img src="images/purchase.png"> Purchase</a></li>
				<li><a href="../logout.php"><img src="images/logout.png"> Log Out</a></li>
			</ul>
		</div>
		<div class="content">
			<h1>Dashboard</h1>
			<p>Here goes your stuffs.</p>

			<div id="box">
				<div class="box-top">Users</div>
				<div class="box-panel">
					<?php echo $num_rows; ?> Users registered.
				</div>
			</div>
			<div id="box">
				<div class="box-top">News</div>
				<div class="box-panel">
					This is some simple news.
				</div>
			</div>
			<div id="box">
				<div class="box-top">News</div>
				<div class="box-panel">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>
		</div>
	</div>
</body>
</html>