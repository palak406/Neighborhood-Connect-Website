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
        

<?php
// $dbc will contain a resource link to the database

// @ keeps the error from showing in the browser
include('navbar.html');


//$connection = mysqli_connect("localhost","root","");

//$dbc = mysqli_select_db($connection,'project 1');
?>

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
    $sent_by=$_GET['varname'];
    $sql = "UPDATE friend  
SET status='1'

WHERE 

(friend_one='$sent_by' OR friend_two='$sent_by') 

AND 

(friend_one='$username' OR friend_two='$username')" ;

if (mysqli_query($db, $sql)) {
    echo "Accepted Request";
} else {
    echo "Error updating record: " . mysqli_error($db);
}


    
}


?>
    </center>

    <?php endif ?>
</body>
</html>