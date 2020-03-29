<?php include 'server2.php';
	$update_query = "UPDATE question
					 SET answer = 'left'
					 WHERE question = 'Predict the direction of heat : 45 degrees, 85 degrees'";

	$res = pg_query($db, $update_query);
?>