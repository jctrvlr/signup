<?php
include("../../../cnf.php");

class database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;
  
  private $dbh;
  private $error;
  
  private $stmt;

  public function __construct() {
	$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
	// Set options
	$options = array(
	  PDO::ATTR_PERSISTENT => true,
	  PDO::ATR_ERRMODE => PDO::ERRMODE-EXCEPTION
	);
	// Create a new PDO instance
	try{
	    $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
	}
	// Catch errors
	catch(PDOException $e){
	    $this->error = $e->getMessage();
	}
  }
  public function query($query) {
	$this->stmt = $this->dbh->prepare($query);
  }
}
class form1 {

  private $first_name;
  private $last_name;
  private $user_name;
  private $email;
  private $passwd;

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
    include("../../../cnf.php");
    $hash = bCrypt($passwd, 12);
    
    $db = new mysqli($hostname, $username, $password, $project);
    // $passwd_md5 = md5($passwd); 
  
    $reg_info = array( "first_name" => "$first_name", "last_name" => "$last_name", "user_name" => "$user_name", "email" => "$email", "passwd" => "$passwd" );
    return $reg_info; 
 }
$obj = new form1;
echo $obj->create_user();
print_r($reg_info);
}
?>
