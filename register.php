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
	  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	// Create a new PDO instance
	try{
	    $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
	}
	// Catch errors
	catch(PDOException $e){
	    $this->error = $e->getMessage();
	    echo phpinfo();
	    echo $this->error;
	}
  }
  public function query($query) {
	$this->stmt = $this->dbh->prepare($query);
  }
  public function bind($param, $value, $type = null)
    {
	if(is_null($type)) {
	  switch(true) {
	    case is_int($value):
	      $type = PDO::PARAM_INT;
	      break;
	    case is_bool($value):
	      $type = PDO::PARAM_BOOL;
	      break;
	    case is_null($value):
	      $type = PDO::PARAM_NULL;
	      break;
	    default:
	      $type = PDO::PARAM_STR;
	  }
	}
	$this->stmt->bindValue($param, $value, $type);
    }
  public function execute()
    {
	return $this->stmt->execute();
    }
  public function resultset()
    {
	$this->execute();
	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  public function single()
    {
	$this->execute();
	return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
  public function rowCount()
    {
	return $this->stmt->rowCount();
    }
  public function lastInsertId()
    {
	return $this->dbh->lastInsertId();
    }
  public function beginTransaction()
    {
	return $this->dbh->beginTransaction();
    }
  public function endTransaction()
    {
	return $this->dbh->commit();
    }
  public function cancelTransaction()
    {
	return $this->dbh->rollBack();
    }
  public function debugDumpParams()
    {
	return $this->stmt->debugDumpParams();
    }
}
class form1 {

  private $first_name;
  private $last_name;
  private $user_name;
  private $email;
  private $passwd;
  protected function password_hash($password)
    {
	$salt = bin2hex(openssl_random_pseudo_bytes(255));
	$hash = crypt($password, '$2a$11$' . $salt);

	$result['salt'] = $salt;
	$result['hash'] = $hash;

	return $result;
    }
  public function create_user($first_name, $last_name, $user_name,
  		$email, $passwd)
    {
    	//Using password_hash function which is provided in class
	//Generate unique salt + hash the password using that salt
        $pass_array = $this->password_hash($passwd);
    	$salt = $pass_array['salt'];
	$hash = $pass_array['hash'];
	
	//Connect to db
	$database = new Database();
	$database->query('INSERT INTO reg (FName, LName, User_name, Email,
	Hash, Salt) VALUES (:fname, :lname, :u_name, :email, :hash, :salt)');
	
	//Bind data to placeholders
	$database->bind(':fname', $first_name);
	$database->bind(':lname', $last_name);
	$database->bind(':u_name', $user_name);
	$database->bind(':email', $email);
	$database->bind(':hash', $hash);
	$database->bind(':salt', $salt);
	
	//Execute statement
	$database->execute();
        // $passwd_md5 = md5($passwd); 
  
        $reg_info = array( "first_name" => "$first_name", "last_name" => "$last_name", "user_name" => "$user_name", "email" => "$email", "passwd" => "$passwd" );
        return $reg_info; 
    }
}
$obj = new form1;
$first = "john";
$last = "cummings";
$user = "jic6";
$email = "jcummings5@gmail.com";
$passwd = "password";
echo $obj->create_user($first, $last, $user, $email, $passwd);
print_r($reg_info);

?>
