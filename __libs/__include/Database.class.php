<? 



class Database{
    public static $con = NULL;

    public static function getconnection(){

        if (Database::$con == NULL){
            $servername = get_config('db_server');
            $username = get_config('db_username');
            $password = get_config('db_password');
            $dbname = get_config('db_name');

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
