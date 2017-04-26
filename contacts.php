<?php
  session_start();
  require_once('sampleLogin/dbconfig/config.php');
  //phpinfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PetCare | Contacts</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/form.css">
<script src="js/jquery.js"></script>
<script src="js/forms.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script>
jQuery(document).ready(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="index.html"><img src="images/logo.png" alt=""></a> </h1>
      <div class="menu_block">
        <nav>
          <ul class="sf-menu">
            <li class="current"><a href="home.php">Home</a></li>
            <li class="with_ul"><a href="about-us.php">About Us</a>
              <ul>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Archive</a></li>
              </ul>
            </li>
            <li><a href="services.php">Services</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contacts.php">Contacts </a></li>
            <?php 
              if($_SESSION) {
                echo '<li><a href="#">Hi! '; echo $_SESSION['username']; echo '</a>';
                echo '<ul><li><a href="sampleLogin/logout.php">Logout </a></li></ul>';
                echo '</li>';
              } else {
                echo '<li><a href="sampleLogin/login.php">Login </a>';
                  echo '<ul><li><a href="logout.php">Logout </a></li></ul>';
                echo "</li>";
              }
            ?> 
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="content pt1">
  <div class="container_12">
    <div class="grid_6">
      <h2>Contact Info</h2>
      <br>
      <div class="map">
        <figure class="img_inner">
          <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=VIT,+VIT+University,+Vellore,+Tamil+Nadu,+India&amp;aq=0&amp;sll=12.9693,79.1559&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Vellore,+Tamil+Nadu,+India&amp;ll=12.9165,79.1325&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
        </figure>
        <address>
        <dl>
          <dt>
            <p>The PetCare Company Inc.<br>
              VIT University,<br>
              Vellore, Tamil Nadu.</p>
          </dt>
          <dd><span>Freephone:</span>+1 800 559 6580</dd>
          <dd><span>Telephone:</span>+91 97900 21321</dd>
          <dd><span>FAX:</span>+1 800 889 9898</dd>
        </dl>
        </address>
      </div>
    </div>
    <div class="grid_5 prefix_1">
      <h2 class="ic1">Contact Form</h2>
      <form id="form" action="#">
        <div class="success_wrapper">
          <div class="success">Contact form submitted!<br>
            <strong>We will be in touch soon.</strong> </div>
        </div>
        <fieldset>
          <label class="name">
            <input type="text" value="Name:">
            <br class="clear">
            <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
          <label class="email">
            <input type="text" value="E-mail:">
            <br class="clear">
            <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>
          <label class="phone">
            <input type="tel" value="Phone:">
            <br class="clear">
            <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
          <label class="message">
            <textarea></textarea>
            <br class="clear">
            <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
          <div class="clear"></div>
          <div class="btns"><a data-type="reset" class="btn">Clear</a><a data-type="submit" class="btn">Send</a>
            <div class="clear"></div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12">
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <p>The PetCare Company &copy; 2017 | <a href="#">Privacy Policy</a> | Design by: <a href="http://geekankit318.github.io">Ankit Dutta</a></p>
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>