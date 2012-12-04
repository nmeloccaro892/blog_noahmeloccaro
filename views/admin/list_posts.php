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

<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th>Title</th>
		<th>Date Published</th>
		<th>Text</th>
		<th></th>
	</tr>
<?php while($post = $results->fetch_assoc()): ?>
	<tr>
		<td><?php echo $post['post_title'] ?></td>
		<td><?php echo $post['post_datepublished'] ?></td>
		<td><?php echo $post['post_text'] ?></td>
		<td class="actions">
			<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=form_editpost&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
			<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
		</td>
	</tr>
<?php endwhile; ?>
</table>