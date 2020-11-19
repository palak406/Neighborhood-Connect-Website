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
  
    <center>
        


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


<?php


if (isset($_SESSION['username'])) :
{ 
     
    $username = $_SESSION['username'];
    $sql1= mysqli_query($db,"select RequestID,requestUsername,requestedblockid from requestblock order by RequestID desc limit 1");

    if ($row = mysqli_fetch_array($sql1)) {
    $RequestID = $row['RequestID'];
    $requestUsername = $row['requestUsername'];
    $requestedblockid = $row['requestedblockid'];



    $req1 = mysqli_query($db, "select requestID from AcceptBlock where requestID='$RequestID' and Acceptuser='$username' ");
    if ($row = mysqli_fetch_array($req1)) {
    $requestID = $row['requestID'];
    echo "$requestedblockid","$requestUsername";



 


?>
  <a href="acceptblock.php?varname=<?php echo $requestID ?>">Accept block Request</a><br/>
  
 <?php
}

}

    
   
}


?>
   </center>

    <?php endif ?>
</body>
</html>