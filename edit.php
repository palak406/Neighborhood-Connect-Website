<?php 
  session_start(); 
  
  
$db = mysqli_connect('localhost', 'root', '', 'project');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }


?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Edit Profile</h2>
  </div>
  
  <form method="post" action="edit.php">
    
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Address</label>
      <input type="text" name="address" >
    </div>
    <div class="input-group">
      <label>City</label>
      <input type="text" name="city" >
    </div>
    <div class="input-group">
      <label>State</label>
      <input type="text" name="state" >
    </div>
    <div class="input-group">
      <label>Postal Code</label>
      <input type="text" name="postalcode" >
    </div>
    <div class="input-group">
      <label>Profile</label>
      <input type="text" name="profile" >
    </div>
    
      <label>Picture</label>
      <input class="image" type="file" name="picture" value="<?php echo $picture; ?>">
   
    <div class="input-group">
      <button type="submit" class="btn" name="edit"> Edit </button>
    </div>
  </form>
</body>
</html>


<?php
   if (isset($_POST['edit'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $postalcode = mysqli_real_escape_string($db, $_POST['postalcode']);
  $profile = mysqli_real_escape_string($db, $_POST['profile']);
  $picture = mysqli_real_escape_string($db, $_POST['picture']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
 if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($city)) { array_push($errors, "city is required"); }
  if (empty($state)) { array_push($errors, "state is required"); }
  if (empty($postalcode)) { array_push($errors, "postalcode is required"); }
  if (empty($profile)){ $profile="NULL";}
  if (empty($picture)){ $picture="NULL";}
  
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userdetails WHERE username='$username' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $user = $_SESSION['username'];
    $query = "UPDATE userdetails  
SET username='$username',password = '$password',address = '$address', city = '$city',state = '$state', postalcode = '$postalcode',profile='$profile',picture = '$picture'

WHERE 

username= '$user' ";

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Updated records";
    header('location: index.php');
  }
}
?>