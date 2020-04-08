<?php
       include 'db_connection.php';
	if (isset($_POST['key'])) {


		$full_name = $conn->real_escape_string($_POST['full_name']);
		$email_address = $conn->real_escape_string($_POST['email_address']);
		$password = $conn->real_escape_string($_POST['s_password']);
		$birthdate = $conn->real_escape_string($_POST['birthdate']);
		$hash_password=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$final_password=$salt.$hash_password;

		if ($_POST['key'] == 'add_new') {
			$fetch_email = $conn->query("SELECT id FROM users WHERE email = '$email_address'");
			$fetch_name = $conn->query("SELECT id FROM users WHERE fullname = '$full_name'");
			if ($fetch_email->num_rows > 0)
				exit("Email Already Exists!");
				if($fetch_name->num_rows > 0)
					exit("Full Name Already Exists!");
			else {
				$conn->query("INSERT INTO users (email, password, fullname, birthdate) 
							VALUES ('$email_address', '$final_password', '$full_name', '$birthdate')");
				exit('Successfully Registered!');
			}
		}
		if ($_POST['key'] == 'login_data') {
			$login_email = $conn->real_escape_string($_POST['login_email']);
			$login_password = $conn->real_escape_string($_POST['login_password']);
			$hash_password=md5($login_password);
			$salt="a1Bz20ydqelm8m1wql";
			$final_password=$salt.$hash_password;
			$sql = mysqli_query($conn, "SELECT u.id,u.fullname,u.email,u.password FROM `users` u WHERE email='$login_email' AND password='$final_password' ");
			$data = $sql->fetch_assoc();
			if ($sql->num_rows > 0) {
				$_SESSION['logged_in'] = '1';
				$_SESSION['user_id'] = $data['id'];
				$_SESSION['fullname'] = $data['fullname'];
				exit('success');
			} else {
				exit('invalid');
			}
		}
		if ($_POST['key'] == 'get_data') {
			$user_id = $_SESSION['user_id'];
			$sql = mysqli_query($conn, "SELECT fullname FROM `users`  WHERE id='$user_id' ");
			$data = $sql->fetch_assoc();
			if ($sql->num_rows > 0) {
				exit(json_encode($data));
			} else {
				exit('null');
			}

		}
	}
?>