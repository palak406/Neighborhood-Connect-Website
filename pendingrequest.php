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
    $req1 = mysqli_query($db, "SELECT f.friend_one ,f.friend_two, f.status from friend f where f.friend_two = '$username' or f.friend_one = '$username' ");



while($row = mysqli_fetch_array($req1))
{ 
  $status = $row['status'];
  $friend_one = $row['friend_one'];
  

  $friend_one = htmlspecialchars($row['friend_one'],ENT_QUOTES);


  
  if ($row['status']=='0')  {
   echo "  <div style='margin:30px 0px;'>
      request_sent_by: $friend_one<br />

      
      
    </div>

  ";
  ?>
  <a href="accept.php?varname=<?php echo $friend_one ?>">Accept Request</a><br/>
  
 <?php
}

}

    
   
}


?>
   </center>

    <?php endif ?>
</body>
</html>