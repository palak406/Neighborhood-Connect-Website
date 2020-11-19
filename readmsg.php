<?php 
  session_start(); 
  include('navbar.html');
  
$db = mysqli_connect('localhost', 'root', '', 'project 1');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }


?>

<html>

<head>
    
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
   
    $messageid=$_GET['varname'];
    
    //$read_date=$_GET['varname3'];
    $req1 = mysqli_query($db , "insert into message_read_status (message_id,user_name,read_date) values ('$messageid','$username',now())");


    if ($req1) {
    echo "msg read";
} else {
    echo "Error updating record: " . mysqli_error($db);
}
}


?>
    </center>

    <?php endif ?>
</body>
</html>