<?php
    session_start();
    require_once('../dbconfig/config.php');
    //phpinfo();
?>

<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="main.css">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

        <title>Admin-Login</title>
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Admin login to Pet Care</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                            alt="">
                        <form action="index.php" method="post" class="form-signin">
                        <input type="text" class="form-control" placeholder="Email or Username" name="username" required autofocus>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">
                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                        </form>

                        <?php
                            if(isset($_POST['login']))
                            {
                                @$username=$_POST['username'];
                                @$password=$_POST['password'];
                                $query = "select * from admin where username='$username' and password='$password' ";
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
                                    $_SESSION['isLoggedin'] = true;
                                    
                                    header( "Location: AdminPanel/dashboard.php");
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
                </div>
            </div>
        </div>
    </body>
</html>

