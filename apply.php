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
	<title>
		search data into textbox
	</title>
</head>
<body>
	<center>
		<form action="" method = "POST">
			<input type="text" name="name" placeholder="enter blockid">
			<input type="submit" name="search" value="send request">
		</form>

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
     if(isset($_POST['search']))
{
	  $name = $_POST['name'];
    $username = $_SESSION['username'];
    $sql = mysqli_query($db,"insert into requestblock (RequestUsername,RequestedBlockID) VALUES ('$username','$name')");

    $sql1= mysqli_query($db,"select RequestID from requestblock order by RequestID desc limit 1");

    if ($row = mysqli_fetch_array($sql1)) {
    $RequestID = $row['RequestID'];

    $req3 = mysqli_query($db,"insert into AcceptBlock(RequestID,Acceptuser) values ('$RequestID','deepankar')");
    $req4 = mysqli_query($db,"insert into AcceptBlock(RequestID,Acceptuser) values ('$RequestID ','deep')");
    $req5 = mysqli_query($db,"insert into AcceptBlock(RequestID,Acceptuser) values ('$RequestID ','saumya')");
    //$req6 = mysqli_query($db,"insert into AcceptBlock(RequestID,Acceptuser) values ('$name','deepankar')";

    


?>


<?php
    
}}}


?>


	</center>
	<?php endif ?>
</body>
</html>