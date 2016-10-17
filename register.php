<?php
class form1 {

  protected $first_name = $_POST["first_name"];
  protected $last_name = $_POST["last_name"];
  protected $user_name = $_POST["user_name"];
  protected $email = $_POST["email_1"];
  protected $passwd = $_POST["password_1"];

  private function bCrypt($pass,$cost)
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
  private function create_user($first_name, $last_name, $user_name,
  		$email, $passwd)
  {
    include("../../../cnf.php")
    $hash = bCrypt($passwd, 12);
    
    $db = new mysqli(
    // $passwd_md5 = md5($passwd); 
  }
  $reg_info = array( "first_name" => "$first_name", "last_name" => "$last_name", 
		"user_name" => "$user_name", "email" => "$email",
		"passwd" => "$passwd" );

print_r($reg_info);
}
?>
