<?php 
  session_start(); 
  include('navbar.html');
  
$db = mysqli_connect('localhost', 'root', '', 'project');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }


?>

<html>

<head>
    <h2>BE A MEMBER OF THE BLOCK</h2>
</head>
<body>
  <a href="apply.php" class="link_new_pm">Send neighbor request</a><br />
  <a href="viewrequest.php" class="link_new_pm">View neighbor request</a><br />
  <a href="viewmyblock.php" class="link_new_pm">View My Block Details</a><br />
    <center>
        


   </center>

    
</body>
</html>