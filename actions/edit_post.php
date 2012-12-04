<?php

// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query with POSTed data
extract($_POST);
$sql = "UPDATE post SET post_title='$post_title', band_genre='$band_genre', band_numalbums=$band_numalbums WHERE band_id=$band_id";

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
	// Redirect
	header('Location:../?p=select_bands');
}

// Close DB connection
$conn->close();