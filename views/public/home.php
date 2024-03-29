<?php 

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Get order, if any is present in QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_datepublished';
}

// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY post_datepublished DESC";

// Execute the query
$results = $conn->query($sql);
?>
<?php $post = $results->fetch_assoc(); ?>
		<?php 
		// Make a PHP timestamp
		$time = strtotime($post['post_datepublished']);
		
		// Format the timestamp for display
		$date = date('l, F j, Y, g:i a',$time);
		?>
		<h2><a href="./?p=public/post&amp;id=<?php echo $post['post_id']?>"><?php echo $post['post_title'] ?></a></h2>
		<h5><?php echo $date ?></h5>
		<p><?php echo $post['post_text'] ?></p>

<?php while($post = $results->fetch_assoc()){?>
	<?php 
		// Make a PHP timestamp
		$time = strtotime($post['post_datepublished']);
		
		// Format the timestamp for display
		$date = date('l, F j, Y, g:i a',$time);
		?>
	<h3><a href="./?p=public/post&amp;id=<?php echo $post['post_id']?>"><?php echo $post['post_title'] ?></a></h3>
	<h5><?php echo $date ?></h5>
<?php
}
// Close connection
$conn->close();	