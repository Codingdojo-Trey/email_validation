<?php
	require('email_connection.php');
	session_start();

	if(isset($_POST['action']) && $_POST['action'] == 'register')
	{
		add_email($_POST['email']);
	}
	elseif(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		delete_email($_GET['id']);
	}

	function add_email($email_address)
	{
		//first, let's validate!!
		if(empty($email_address))
		{
			$_SESSION['error'] =  "email address cannot be blank, fool";
			header("location: index.php");
			die();
		}
		elseif(!filter_var($email_address, FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['error'] = "your email is invalid, BUT not blank!  Closer...";
			header("location: index.php");
			die();
		}
		else
		{
			$query = "INSERT INTO emails (email, created_at, updated_at) VALUES ('{$email_address}', NOW(), NOW())";
			run_mysql_query($query);
			$_SESSION['success'] = "CONGRATULATIONS1!!!!!  The email you entered, {$email_address} was totally valid!";
			header('location: success.php');
			die();
		}
		
	}

	function delete_email($id)
	{
		$query = "DELETE FROM emails WHERE id = {$id}";
		run_mysql_query($query);
		$_SESSION['success'] = "you deleted an email, you vicious man";
		header('location: success.php');
		die();
	}
?>