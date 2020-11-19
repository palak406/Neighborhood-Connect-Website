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
    
</head>
<body>
  <a href="newmsg.php" class="link_new_pm">New Message</a><br />
  <a href="newgroupmsg.php" class="link_new_pm">New Block Group Message</a><br />
  <a href="viewmessage.php" class="link_new_pm">View Unread Messages</a><br />
  <a href="viewallmessage.php" class="link_new_pm">View Messages</a><br />
  <a href="viewsentmessage.php" class="link_new_pm">Sent Messages</a><br />

    <center>
        

    </center>

</body>
</html>