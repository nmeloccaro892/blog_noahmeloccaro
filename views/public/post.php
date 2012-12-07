<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct the query (SQL)
$sql = "SELECT * FROM posts WHERE post_id=".$_GET['id'];

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
		<h2><?php echo $post['post_title'] ?></h2>
		<h5><?php echo $date ?></h5>
		<p><?php echo $post['post_text'] ?></p>