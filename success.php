<?php
	session_start();
	require('email_connection.php');
	$query = "SELECT * FROM emails";
	$emails = fetch_all($query);
  ?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		if(isset($_SESSION['success']))
		{
			echo "<h2>{$_SESSION['success']}</h2>";
			unset($_SESSION['success']);
		}
	 ?>
	 <h1>Here are all of the awesome emails people have already used:</h1>
	 <ul>
	 	<?php 
	 		foreach($emails as $email)
	 		{
	 			echo "<li>{$email['email']} <a href='process.php?action=delete&id={$email['id']}'>remove user from list</a></li>";
	 		}
		?>
	 </ul>
	 <a href="index.php"><button>add another email!</button></a>
	
</body>
</html>