<?php
	session_start();
 ?>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 	*
 	{
 		font-family: sans-serif;
 	}
 	</style>
 </head>
 <body>
 	<h1>Enter your email!</h1>
 	<?php 
 		if(isset($_SESSION['error']))
 		{
 			echo "<h2 style='color: red;'>{$_SESSION['error']}</h2>";
 			//never ever ever ever forget to unset your errors
 			unset($_SESSION['error']);
 		}
 	 ?>
 	<form action='process.php' method='post'>
 		<input type='text' name='email'>
 		<input type='hidden' name='action' value='register'>
 		<input type='submit' value='add yo email sucka!'>
 	</form>
 </body>
 </html>