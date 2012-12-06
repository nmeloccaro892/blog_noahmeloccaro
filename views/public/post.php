<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct the query (SQL)
$sql = "SELECT * FROM posts WHERE post_id=".$_GET['id'];

// Execute the query
$results = $conn->query($sql);
?>
<?php $post = $results->fetch_assoc(); ?>
		<h2><?php echo $post['post_title'] ?></h2>
		<h5><?php echo $post['post_datepublished'] ?></h5>
		<p><?php echo $post['post_text'] ?></p>