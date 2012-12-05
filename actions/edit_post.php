<?php
// Initialize Session
session_start();

// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query with Posted data
extract($_POST);
$post_title = addslashes($post_title);
$post_text = addslashes($post_text);
$sql = "UPDATE posts SET post_title='$post_title', post_text='$post_text' WHERE post_id=$post_id";

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	// Message to be displayed upon edit
	$_SESSION['flash'] = array(
			'message' => "The article was edited succesfuly.",
			'type' => 'success',
	);
	// Redirect
	header('Location:../?p=admin/list_posts');
}

// Close DB connection
$conn->close();