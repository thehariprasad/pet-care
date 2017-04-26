<?php
$status = $_GET["status"];

if($status == "disp") {
	$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
	mysqli_select_db ($con,'pet_care');
	$query = "select * from user";
	$result = mysqli_query($con,$query) or die('Error getting Data.');
	

	echo "<table id='t01'>";
	echo "<tr> <th>No.</th> <th>username</th> <th>Email</th> <th>Contact</th> <th>Action</th> </tr>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<tr>";
		echo "<td>"; echo $row["id"]; echo "</td>";
		echo "<td>"; ?><div id="username<?php echo  $row["id"]; ?>"> <?php echo $row["username"]; ?> </div> <?php echo "</td>";
		echo "<td>"; ?><div id="email<?php echo  $row["id"]; ?>"> <?php echo $row["email"]; ?> </div> <?php echo "</td>";
		echo "<td>"; ?><div id="contact<?php echo  $row["id"]; ?>"> <?php echo $row["mobile_no"]; ?> </div> <?php echo "</td>";

		echo "<td>"; ?> 
		<input type="button" id="<?php echo $row["id"]; ?>" name="<?php echo $row["id"]; ?>" value="delete" style="background-color: #e74c3c; padding: 6px; text-align: center; width: auto; border-radius: 8px; margin: 2px; font-size: 0.95em" onClick="delete1(this.id)"> 
		<input type="button" id="<?php echo $row["id"]; ?>" name="<?php echo $row["id"]; ?>" value="edit" style="background-color: #27ae60; padding: 6px; text-align: center; width: auto; border-radius: 8px; margin: 2px; font-size: 0.95em" onClick="aa(this.id)">
		<input type="button" id="<?php echo $row["id"]; ?>" name="<?php echo $row["id"]; ?>" value="view" style="background-color: #2980b9; padding: 6px; text-align: center; width: auto; border-radius: 8px; margin: 2px; font-size: 0.95em" onClick="aa(this.id)"> 
		<?php echo "</td>";
		// echo "<span class='button'>"."<button id='btn-view'>"."View"."</button>"."</span>";
		// echo "<span class='button'>"."<button id='btn-edit'>"."Edit"."</button>"."</span>";
		// echo "<span class='button'>"."<button name='delete' type='submit' action='users.php' id='btn-delete'>"."Delete"."</button>"."</span>";
		// echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}


if($status == "delete") {
	$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
	mysqli_select_db ($con,'pet_care');
	$id = $_GET["id"];
	$res = mysqli_query($con, "delete from user where id=$id");

}

if($status == "insert") {
	$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
	mysqli_select_db ($con,'pet_care');
	$name = $_GET["name"];
	$email = $_GET["email"];
	$mobile = $_GET["mobile"];
	$password = md5('petcare');
	$res = mysqli_query($con, "INSERT into user (username, email, mobile_no, password) VALUES ('".$name."', '".$email."', $mobile, '$password')");

}

?>