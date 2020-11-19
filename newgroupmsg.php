<?php    
session_start();
include('navbar.html');
$db = mysqli_connect('localhost', 'root', '', 'project');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
//$message = $_POST['forward2'];
 if (isset($_POST['submit']))
{
// if the form has been submitted, this inserts it into the Database 
  $to_user1 = $_POST['to_user1'];
  $to_user2 = $_POST['to_user2'];
  $to_user3 = $_POST['to_user4'];
  $to_user4 = $_POST['to_user5'];

  $from_user = $_POST['from_user'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  $req1 = mysqli_query($db,"INSERT INTO threads(initiated_date, recipient_type,recipient_user, thread_subject, initiated_by) VALUES (now(),'block','$to_user1,'$subject','$from_user')");
  $req5 = mysqli_query($db,"INSERT INTO threads(initiated_date, recipient_type,recipient_user, thread_subject, initiated_by) VALUES (now(),'block','$to_user2,'$subject','$from_user')");
  $req6 = mysqli_query($db,"INSERT INTO threads(initiated_date, recipient_type,recipient_user, thread_subject, initiated_by) VALUES (now(),'block','$to_user3,'$subject','$from_user')");
  $req7 = mysqli_query($db,"INSERT INTO threads(initiated_date, recipient_type,recipient_user, thread_subject, initiated_by) VALUES (now(),'block','$to_user4,'$subject','$from_user')");


  $req2 = mysqli_query($db,"select thread_id from threads");
  if($row = mysqli_fetch_array($req2)){
    $thread_id = $row['thread_id'];
  
  
  mysqli_query($db,"INSERT INTO messages ( message_body, thread_id,message_author_name,message_location,message_date) VALUES ('$message','$thread_id', '$from_user','null',now())");
  $req3 = mysqli_query($db,"select message_id from messages ORDER BY message_id DESC limit 1");
 if ($row = mysqli_fetch_array($req3)) {
    $message_id = $row['message_id'];
    mysqli_query($db,"INSERT INTO message_tracker (message_id,message_receiver_name, message_read) VALUES ('$message_id','$to_user1','0')");
    mysqli_query($db,"INSERT INTO message_tracker (message_id,message_receiver_name, message_read) VALUES ('$message_id','$to_user2','0')");
    mysqli_query($db,"INSERT INTO message_tracker (message_id,message_receiver_name, message_read) VALUES ('$message_id','$to_user3','0')");
    mysqli_query($db,"INSERT INTO message_tracker (message_id,message_receiver_name, message_read) VALUES ('$message_id','$to_user4','0')");

  }
  
  echo "succesfully sent!"; 

}} 
{
    // if the form has not been submitted, this will show the form
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2><h3>Send Group Message:</h3></td></tr>
<tr><td></td><td>
<input type="hidden" name="from_user" maxlength="32" value = <?php echo $_SESSION['username']; ?>>
</td></tr>
<tr><td>Subject: </td><td>
<input type="text" name="subject" maxlength="32" value = "">
</td></tr>
<tr><td>Block Member One: </td><td>
<input type="text" name="to_user1" maxlength="32" value = "">
</td></tr>
<tr><td>Block Member Two: : </td><td>
<input type="text" name="to_user2" maxlength="32" value = "">
</td></tr>
<tr><td>Block Member Three: : </td><td>
<input type="text" name="to_user3" maxlength="32" value = "">
</td></tr>
<tr><td>Block Member Four: : </td><td>
<input type="text" name="to_user4" maxlength="32" value = "">
</td></tr>
<tr><td>Add more : </td><td>
<input type="text" name="to_user" maxlength="32" value = "">
</td></tr>
<tr><td>Message: </td><td>
<TEXTAREA NAME="message" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA>
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="submit" value="Send Message">
</td></tr>
</table>
</form>
<?php
}
?>