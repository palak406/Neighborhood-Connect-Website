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
    <h2>Friends</h2>
</head>
<body>
  <a href="viewfriend.php" class="link_new_pm">View Friends</a><br />
  <a href="viewneighbor.php" class="link_new_pm">View Neighbors</a><br />
  <a href="pendingrequest.php" class="link_new_pm">Pending Requests</a><br />
  <a href="sendrequest.php" class="link_new_pm">Send Friend Request</a><br />
  <a href="sendneighborrequest.php" class="link_new_pm"> Send Neighbor Request </a><br/>
    <center>
        


   </center>

    
</body>
</html>