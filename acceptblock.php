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
    <h2>Accept Request</h2>
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
    $requestID=$_GET['varname'];
    
    $sql = "UPDATE acceptblock  
SET status='1'

WHERE 

(RequestID='$requestID' and Acceptuser='$username') " ;
if (mysqli_query($db, $sql)) {
    echo "Accepted Request";
} 


    
}


?>
    </center>

    <?php endif ?>
</body>
</html>