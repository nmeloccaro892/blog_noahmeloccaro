<?php 
// Check to see if there is a message in our session data
if(isset($_SESSION['flash'])) {
	// Display message
	echo '<p class="alert alert-'.$_SESSION['flash']['type'].'">';
	echo $_SESSION['flash']['message'];
	echo '</p>';
		
	// Remove message from session data
	unset ($_SESSION['flash']);
}
?>