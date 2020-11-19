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
			<input type="text" name="name" placeholder="enter username to send request">
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
    $sql = "INSERT INTO friend(friend_one,friend_two) VALUES
('$name','$username')" ;

if (mysqli_query($db, $sql)) {
    echo "Sent Request";
} else {
    echo "Error updating record: " . mysqli_error($db);
}


    
}}


?>
	</center>
	<?php endif ?>
</body>
</html>