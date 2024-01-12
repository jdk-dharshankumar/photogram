<?

include_once 'Database.class.php';


class User {

  private $conn;
  private $id;

  public function __call($name, $arguments)
  {
      $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
      $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
      if(substr($name,0,3)== "get"){
        return $this->_get_data($property);
      }elseif(substr($name,0,3)== "set"){
        return $this->_set_data($property, $arguments[0]);
      }
    
  }


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
     
      $query="SELECT `password`, `username`,`id` FROM `auth` WHERE `username` = '$user'";
      $conn = Database::getconnection();
      $result=$conn->query($query);
      
      if ($result){
          $row=$result->fetch_assoc();
          

          // if($pass == $row['password']){
            if(password_verify($pass, $row['password'])){     //crypto_decoding and verfying the password
            
              return $row['username'];
          }else{
            return false;
          }
      }else{
        echo false;
      }

    }

    public function __construct($username)
    {
        //TODO: Write the code to fetch user data from Database for the given username. If username is not present, throw Exception.

        $this->conn = Database::getConnection();
        $this->username = $username;
        // $this->id = null;
        $sql = "SELECT `id` FROM `auth` WHERE `username`= '$username'OR `id` = '$username' LIMIT 1";
        
        $result = $this->conn->query($sql);
        
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id']; //Updating this from database
        
        } 
    }


 
    //this function helps to retrieve data from the database
    private function _get_data($var)
    {
        // print("hello $var\n");
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT `$var` FROM `users` WHERE `id` = '$this->id'";
       
        $result = $this->conn->query($sql);
        if ($result and $result->num_rows == 1) {
            return $result->fetch_assoc()["$var"];
        } else  return null;
    }

    //This function helps to  set the data in the database
    private function _set_data($var, $data)
    {
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE `users` SET `$var`='$data' WHERE `id`='$this->id'";
        if ($this->conn->query($sql)) {
            return true;
        } else return false;
    }
    public function setDob($year, $month, $day)
    {
        if (checkdate($month, $day, $year)) { //checking data is valid
            return $this->setData('dob', "$year.$month.$day");
        } else return false;
    }
     public function getUsername(){
      return $this->username;
     }

    public function authenticate(){

    // }
    // public function setBio($bio)
    // {
    //     //TODO: Write UPDATE command to change new bio
    //     return $this->setData('bio', $bio);
    // }

    // public function getBio()
    // {
    //     //TODO: Write SELECT command to get the bio.
    //     return $this->_get_data('bio');
    // }

    // public function setAvatar($link)
    // {
    //     return $this->setData('avatar', $link);
    // }

    // public function getAvatar()
    // {
    //     return $this->_get_data('avatar');
    // }

    // public function setFirstname($name)
    // {
    //     return $this->setData("firstname", $name);
    // }

    // public function getFirstname()
    // {
    //     return $this->_get_data('firstname');
    // }

    // public function setLastname($name)
    // {
    //     return $this->setData("lastname", $name);
    // }

    // public function getLastname()
    // {
    //     return $this->_get_data('lastname');
    // }

   

    // public function getDob()
    // {
    //     return $this->_get_data('dob');
    // }

    // public function setInstagramlink($link)
    // {
    //     return $this->setData('instagram', $link);
    // }

    // public function getInstagramlink()
    // {
    //     return $this->_get_data('instagram');
    // }

    // public function setTwitterlink($link)
    // {
    //     return $this->setData('twitter', $link);
    // }

    // public function getTwitterlink()
    // {
    //     return $this->_get_data('twitter');
    // }
    // public function setFacebooklink($link)
    // {
    //     return $this->setData('facebook', $link);
    // }

    // public function getFacebooklink()
    // {
    //     return $this->_get_data('facebook');
    // 
  }


}
