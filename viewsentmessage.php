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
$query = mysqli_query($db,"select message_body,recipient_user from messages join threads on messages.thread_id=threads.thread_id where message_author_name='$user' ");
while($row2 = mysqli_fetch_array($query))
{ 

  
  echo "<table border=1>";
  echo "<tr><td>";
  echo "Sent to:";
  echo $row2['recipient_user'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "message:";
  echo $row2['message_body'];
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
</form>
<?php
}
}

echo "</table>";
?>