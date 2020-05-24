<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$Gender = $_POST['Gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$phone = $_POST['phone'];
	$tc = $_POST['tc'];

	//data collect

	$connect = new mysqli('localhost','root','','test');
	if($connect->data_error) {
		die('Connection Failed : '.$connect->data_error);
	} else {
		$stmt = $connect->prepare("insert into registration(fname,lname,dob,Gender,email,password,cpassword,phone,tc) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssis",$fname,$lname,$dob,$Gender,$email,$password,$cpassword,$phone,$tc);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration Successful!!";
		$stmt->close();
		$connect->close();
	}

?>