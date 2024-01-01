<?

include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/Database.class.php';
include $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__load.php';


class user {

    public static function signup($user,$email,$pass,$phone) {

      $pass= strrev(md5($pass));     //saving the pass in hash format,it is security through obscurity

        $conn = Database::getconnection();

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
      
        $sql = "INSERT INTO `isgn` (`username`, `email`, `password`, `phonenumber`)
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


    public static function login ($user,$pass){
    
      $pass= strrev(md5($pass)); 
      echo "pass:".$pass;
      $query="SELECT `password`, `id` FROM `isgn` WHERE `username` = '$user'";
      $conn = Database::getconnection();
      $result=$conn->query($query);
      if ($result){
          $row=$result->fetch_assoc();
          print($row);
          if($pass == $row['password']){
            return $row;
          }else{
            return false;
          }
      }else{
        echo false;
      }

    }
}
