<?

include_once 'Database.class.php';


class User {

    

    public static function signup($user,$email,$pass,$phone) {

      // $pass= strrev(md5($pass));     //saving the pass in hash format,it is security through obscurity

      $options=['cost'=> 8];
      $pass=password_hash($pass,PASSWORD_BCRYPT,$options);    //crypto-encoding
        $conn = Database::getconnection();

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


    public static function login ($user,$pass){
    
      // $pass= strrev(md5($pass)); 
     
      $query="SELECT `password`, `id` FROM `auth` WHERE `username` = '$user'";
      $conn = Database::getconnection();
      $result=$conn->query($query);
      
      if ($result){
          $row=$result->fetch_assoc();
          

          // if($pass == $row['password']){
            if(password_verify($pass, $row['password'])){     //crypto_decoding and verfying the password
            return $user;
          }else{
            return false;
          }
      }else{
        echo false;
      }

    }
}
