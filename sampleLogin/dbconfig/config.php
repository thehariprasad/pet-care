/*<?php
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'pet_care');
?>*/
<?php

    $con = new mysqli("localhost","root","","pet_care");
           if($con -> connect_errno > 0)
    {
        die ("Unable to connect to database : " . $con ->connect_error);
    }

?>


