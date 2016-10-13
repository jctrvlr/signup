<?php
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$user_name = $_POST["user_name"];
$email = $_POST["email_1"];
$passwd = $_POST["password_1"];

function bCrypt($pass,$cost)
{
	$chars='./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	// Build the beginning of the salt
	$salt = sprintf('$2a$%02d$', $cost);
	// Seed the random generator

	mt_srand();

	// Generate a random salt
	for9$i=0;$i<22;$i++) $salt.=$chars[mt_srand(0,63)];

	// return the hash
	return crypt($pass,$salt);
}
$hash = bCrypt($passwd, 12);

// $passwd_md5 = md5($passwd); 
$reg_info = array( "first_name" => "$first_name", "last_name" => "$last_name", 
		"user_name" => "$user_name", "email" => "$email",
		"passwd" => "$passwd" );

print_r($reg_info);
?>
