<?php
	session_start();

	$errmsg_arr = array();

	$errflag = false;
	
	$link = mysqli_connect('localhost','root',"");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
	
$db = mysqli_select_db($link, "cruid");
    if (!$db) {
        die("Database selection failed: " . mysqli_connect_error());
    }

	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
	
	 $login = $_POST['username'] =    filter_var($_POST['username'], FILTER_SANITIZE_EMAIL); 
$password = $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	 $result  = mysqli_query($link, "SELECT * FROM user WHERE username='$login' AND password='$password'") or die(mysqli_error($link));
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
			session_write_close();
			header("location: main/index.php");
			exit();
		}else {
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>