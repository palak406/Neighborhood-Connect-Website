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


<body>
			

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
	  $req1 = mysqli_query($db,"select requestID from AcceptBlock where status='1' ");
    if ($row = mysqli_fetch_array($req1)) {
    $requestID = $row['requestID'];

   

    echo $requestID;
}
}


?>
	</center>
	<?php endif ?>
</body>
</html>