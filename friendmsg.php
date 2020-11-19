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

    <div class="content">

<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
    $username = $_SESSION['username']
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$req1 = mysql_query("INSERT into thread (createdby,threadCategory) VALUES 

  ('$username','friends')");

$req2 = mysql_query("insert into ThreadGroup (user_name,GroupName) VALUES

  ('$username','friends')");

$req3 = mysql_query("insert into threadgroupusers(group_ID,participant_name) VALUES

  ('1','shivang'),

  ('1','saumya'),

  ('1','shaurya')");

$req1 = mysql_query("INSERT into thread (createdby,threadCategory) VALUES 

  ('$username','friends')");

?>
This is the list of your messages:<br />
<a href="new_pm.php" class="link_new_pm">New PM</a><br />
<h3>Unread Messages(<?php echo intval(mysql_num_rows($req1)); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date of creation</th>
    </tr>
<?php
//We display the list of unread messages
while($dn1 = mysql_fetch_array($req1))
{
?>
        <tr>
        <td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn1['reps']-1; ?></td>
        <td><a href="profile.php?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></td>
    </tr>
<?php
}
//If there is no unread message we notice it
if(intval(mysql_num_rows($req1))==0)
{
?>
        <tr>
        <td colspan="4" class="center">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Read Messages(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date or creation</th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = mysql_fetch_array($req2))
{
?>
        <tr>
        <td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn2['reps']-1; ?></td>
        <td><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></td>
    </tr>
<?php
}
//If there is no read message we notice it
if(intval(mysql_num_rows($req2))==0)
{
?>
        <tr>
        <td colspan="4" class="center">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
        echo 'You must be logged to access this page.';
}
?>
                </div>
                
        </body>
</html>