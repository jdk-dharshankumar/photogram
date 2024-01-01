<? 

class Sessions{

    public static function start() {

        session_start();               // created the new session
        
    }

    public static function destroy() {
        session_destroy();                 // destroys the whole sessions
        
    }

    public static function isset($key){
        return isset($_SESSION[$key]);      // checks the key is present or already exisiting
    }

    public static function get ($key,$default=false){
        if(sessions::isset($key)){
        return $_SERVER[$key];                  // to get the key
    }else{
        return $default;
    }
    }

    public static function set($key,$value){
        return $_SERVER[$key]=$value;         // to receive the value by the key

    }
}
