<?php 
  session_start(); 
  include('navbar.html');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>

<div class="header">
	<h2>About Us</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Nextdoor is the world’s largest social network for the neighborhood. Nextdoor enables truly local conversations that empower neighbors to build stronger and safer communities.</p>

<p>Building connections in the real world is a universal human need. That truth, and the reality that neighborhoods are one of the most important and useful communities in our lives, have been a guiding principle for Nextdoor since it was founded in 2011. Neighbors in the United States, United Kingdom, France, Germany, the Netherlands, Italy, Spain, Australia, Denmark, Sweden, and Canada are using Nextdoor to:</p>

<p>Find a trustworthy babysitter or recommended house painter</p>
<p>Spread the word about a lost dog
Organize a neighborhood watch group or quickly get the word out about a break-in
Share information during a natural disaster
Receive information from local public agencies
Find a new home for an outgrown bicycle
Nextdoor is a privately-held company based in San Francisco with backing from prominent investors including Benchmark, Shasta Ventures, Greylock Partners, Kleiner Perkins, Riverwood Capital, Bond, Axel Springer, Comcast Ventures and others.

Nextdoor is free, and it’s easy to sign up.</p>
    	
    <?php endif ?>
</div>
		
</body>
</html>