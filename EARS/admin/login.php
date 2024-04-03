<?php
	require_once 'db_connect.php';
	extract($_POST);
	$qry = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));
	$login = $qry->fetch_array();

	if($qry->num_rows > 0){
		echo true;
		session_start();
		foreach($login as $k => $v){
			if(!is_numeric($k) && $k !== 'password') {
				// Ensure 'department' is not set in session
				if($k !== 'department') {
					$_SESSION['login_'.$k] = $v;
				}
			}
		}
	}

	$conn->close();
?>
