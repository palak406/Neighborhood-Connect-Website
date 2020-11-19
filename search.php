<?php
// Include the database config file
include('navbar.html');
$db = mysqli_connect('localhost', 'root', '', 'project 1');

// If the search form is submitted
$searchKeyword = $whrSQL = '';
if(isset($_POST['searchSubmit'])){
    $searchKeyword = $_POST['keyword'];
    if(!empty($searchKeyword)){
        // SQL query to filter records based on the search term
        $whrSQL = "WHERE (username LIKE '%".$searchKeyword."%')";
    }
}

// Get matched records from the database
$result = $db->query("SELECT * FROM userdetails $whrSQL ");

// Highlight words in text
function highlightWords($text, $word){
    $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="hlw">\\0</span>', $text);
    return $text;
}
?>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $username = !empty($searchKeyword)?highlightWords($row['username'], $searchKeyword):$row['username'];
        
?>
<div class="list-item">
    <h4><?php echo $username; ?></h4>
    
</div>
<?php } }else{ ?>
<p>No post(s) found...</p>
<?php } ?>