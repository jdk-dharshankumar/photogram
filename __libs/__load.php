<? 
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/Sessions.class.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/User.class.php';

  Sessions::start();
function signup($user ,$email,$pass,$phone){

  $servername = "localhost";
  $username = "root";
  $password = "Sridharsh@12";
  $dbname = "_php_conn";
  

  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO `auth` (`username`, `email`, `password`, `phonenumber`)
  VALUES ('$user', '$email', '$pass', '$phone');";
  $result= false;

  if ($conn->query($sql) === TRUE) {
    $result= true;
  }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $result=false;
  }

  $conn->close();
  return $result;

}


function validate($username ,$password) {
    if ($username == "dharshan@we.com" and $password == 'ip'){
        return true;
    }if ($username == "sagar@we.com" and $password == 'ss') {
        return true;
    }else{
        return false;
    }
    
}

?>


 

