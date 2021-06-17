<?php  
session_start();
require_once 'config.php';
if ($_GET) {
	$token = $_GET['token'];
	// echo "$token";

	$sql = "SELECT * FROM users WHERE token='$token'";
	// echo "$sql";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	// echo "<pre>";print_r($row);

	if ($token != $row['token']) {
		echo "<script>alert('Woops! Something Went Wrong.')</script>";
		echo "<script>window.location.href='register.php'</script>";
	}
}
else{
		echo "<script>alert('Invalid URL');window.location.href='index.php';</script>";
	}
if ($_POST) {
	$code = md5($_POST['code']);
	// echo "$code";exit;

	$sql = "SELECT * FROM users WHERE token='$token'";
	// echo "$sql";exit;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	// echo "<pre>";print_r($row);exit;

	if ($code != $row['security_code']) {
		echo "<script>alert('Code does not Match ReTry')</script>";
	}
	else{
		$sql = "UPDATE users SET status='1' WHERE security_code='$code'";
		// echo "$sql";exit;
		$result = $conn->query($sql);
		// $row = $result->fetch_assoc();
		// echo "<pre>";print_r($row);exit;
		echo "<script>alert('Account Verified Successfully');window.location.href='index.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>VERIFICATION</title>
</head>
<body>
	<form name="verify_code" class="verify_code" id="verify_code" action="" method="POST">
		<center>
			<p></p><br><br><br><br><br>
				<h2>Verify Your Code</h2>
			<br><br><br><br><br>
			<label>Enter here </label><input type="text" minlength="6" maxlength="6" name="code" >
			<input type="submit" name="submit">
		</center>
	</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#verify_code').validate({
			rules: {
				code: {
					number: true,
					required: true,
				}
			}
		});
	});
</script>
<style type="text/css">

	.verify_code{
		margin: auto;
		width: 50%;
		vertical-align: top;
		padding: 10px;
	}
	input{
		padding: 1rem 3rem;
	}

</style>