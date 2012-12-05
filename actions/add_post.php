<?php
// Initialize the session
session_start();

// Extract POST data
extract($_POST);	

// Check to see if all info was provided
if($post_title == '' || $post_text == '' ) {
	// Message to be displayed on next request
	// Message to be displayed on next request
	$_SESSION['flash'] = array(
		'message' => 'Please provide all information.',
		'type' => 'danger'
	);
	
	// Store the form data into session data
	$_SESSION['post_title'] = $post_title;
	$_SESSION['post_text'] = $post_text;
	
	// Redirect back to the form
	header('Location:../?p=admin/form_addpost');
	
	// Stop executing the current request
	// and send whatever is in the output buffer
	// to the browser
	die();
}

// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$post_title = addslashes($post_title);
$post_text = addslashes($post_text);
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";
echo $sql;

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
	// Message to be displayed on next request
	$_SESSION['flash'] = array(
		'message' => "Post has been added!",
		'type' => 'success'
	);
	
	// Redirect
	header('Location:../?p=public/home');
}

// Close connection
$conn->close();