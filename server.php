<?php
session_start();

// initializing variables
$username = "";
$address    = "";
$city    = "";
$state    = "";
$postalcode    = "";
$profile    = "";
$picture    = "";
$errors = array();  

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
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
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userdetails WHERE username='$username'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "insert into userdetails (username,password,address,city,state,postalcode,profile,picture) 
          VALUES('$username', '$password', '$address','$city','$state','$postalcode','$profile','$picture')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM userdetails WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $query = "INSERT INTO login_logs(username, login_time) VALUES ($username,now())";
      $results = mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>