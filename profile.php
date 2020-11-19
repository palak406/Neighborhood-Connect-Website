<?php
session_start();
include('navbar.html');
  
$db = mysqli_connect('localhost', 'root', '', 'project');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

$user = $_SESSION['username'];

if (isset($_SESSION['username'])) {
$user = $_SESSION['username'];

$query = mysqli_query($db,"select username,Address,City,State,PostalCode,Profile from userdetails where username='$user'");
while($row2 = mysqli_fetch_array($query))
{ 

  
  echo "<table border=1>";
  echo "<tr><td>";
  echo "username: ";
  echo $row2['username'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "Address: ";
  echo $row2['Address'];
  echo "</td></tr>";
   echo "<tr><td>";
  echo "City: ";
  echo $row2['City'];
  echo "</td></tr>";
   echo "<tr><td>";
  echo "State: ";
  echo $row2['State'];
  echo "</td></tr>";
   echo "<tr><td>";
  echo "PostalCode: ";
  echo $row2['PostalCode'];
  echo "</td></tr>";
   echo "<tr><td>";
  echo "Profile: ";
  echo $row2['Profile'];
  echo "</td></tr>";

?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2></td></tr>
<tr><td></td><td>
<input type="hidden" name="id" maxlength="32" value = "<?php echo $row2['id']; ?>">
</td></tr>
<tr><td colspan="2" align="right">

</td></tr>
</table>

<p>
      Want to update your information? <a href="edit.php">Edit Profile</a>
    </p>
</form>
<?php
}
}

echo "</table>";
?>



