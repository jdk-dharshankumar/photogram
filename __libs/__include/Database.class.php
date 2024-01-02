<? 



class Database{
    public static $con = NULL;

    public static function getconnection(){

        if (Database::$con == NULL){
            $servername = "localhost";
            $username = "root";
            $password = "Sridharsh@12";
            $dbname = "_php_conn";
          
            $connction = new mysqli($servername, $username, $password, $dbname);
          
            if ($connction->connect_error) {
              die("Connection failed: " . $connction->connect_error);
            }else {
                
                Database::$con = $connction; // replacing null with actual connection
                return Database::$con;
            }

        }else {
            
            return Database::$con;
        }
    }
}
