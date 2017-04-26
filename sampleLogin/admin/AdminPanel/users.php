<?php
	session_start();
	if(!$_SESSION['isLoggedin']) {
  		header("location: ../index.php"); 
  		die(); 
	}
	require_once('../../dbconfig/config.php');
	//phpinfo();
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
            header("location: ../index.php");
            echo '<script type="text/javascript">alert("Session Timed out. Please log in again.")</script>';
        }
    }
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
				<li><a href="#"><img src="images/user.png"> Hi! <?php echo "<strong>".$_SESSION['username']."</strong>"; ?></a></li>
				<li><a href="dashboard.php"><img src="images/dashboard.png"> Dashboard</a></li>
				<li><a class="selected" href="users.php"><img src="images/user.png"> Users</a></li>
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
					<?php echo "<span style='font-weight: 400;'>".$num_rows."</span>" ?> Users registered.
				</div>
			</div>
			<div id="box">
				<div class="box-top">Users table</div>
				<div class="box-panel">
				<form name="form1" action="" method="post">
					
					<div id="disp_data"></div>
					<input type="text" style="padding: 5px; margin: : 10px;" id="txtnameins" placeholder="username">
					<input type="text" style="padding: 5px; margin: : 10px;" id="txtemailins" placeholder="email">
					<input type="text" style="padding: 5px; margin: : 10px;" id="txtmobileins" placeholder="mobile">
					<input type="button" style="background-color: #2980b9; padding: 8px; text-align: center; width: auto; border-radius: 8px; margin: 2px; font-size: 0.95em" id="but1" value="insert" onClick="ins();">

						<script type="text/javascript">
							disp_data();
							function disp_data() {
								var xmlhttp = new XMLHttpRequest();
									xmlhttp.open("GET", "update.php?status=disp", false);
									xmlhttp.send(null);
								document.getElementById("disp_data").innerHTML=xmlhttp.responseText;
							}


							function delete1(id) {
								var xmlhttp = new XMLHttpRequest();
									xmlhttp.open("GET", "update.php?id="+id+"&status=delete", false);
									xmlhttp.send(null);
								disp_data();
							}

							function ins() {
								var name = document.getElementById("txtnameins").value;
								var email = document.getElementById("txtemailins").value;
								var mobile = document.getElementById("txtmobileins").value;
								var xmlhttp = new XMLHttpRequest();
									xmlhttp.open("GET", "update.php?name="+name+"&email="+email+"&mobile="+mobile+"&status=insert", false);
									xmlhttp.send(null);
								disp_data();
								console.log(name);
								console.log(email);
								console.log(mobile);

								document.getElementById("txtnameins").value="";
								document.getElementById("txtemailins").value="";
								document.getElementById("txtmobileins").value="";
							}
						</script>
					</form>
				</div>
			</div>

			
		</div>
	</div>
</body>
</html>