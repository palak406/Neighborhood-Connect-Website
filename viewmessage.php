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
$query = mysqli_query($db,"SELECT message_tracker.message_id,message_author_name,message_body from messages join message_tracker on messages.message_id=message_tracker.message_id where message_read=0 and message_receiver_name='$user' ");
while($row2 = mysqli_fetch_array($query))
{ 

  $message_id=$row2['message_id'];
  echo "<table border=1>";
  echo "<tr><td>";
  echo "message from:";
  echo $row2['message_author_name'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "message:";
  echo $row2['message_body'];
  echo "</td></tr>";
  $req2 = mysqli_query($db,"UPDATE  message_tracker set message_read=1 where message_id='$message_id' ");

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
</form>
<?php
}
}

echo "</table>";
?>