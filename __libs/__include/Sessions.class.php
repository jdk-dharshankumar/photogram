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
        if(Sessions::isset($key)){
            return $_SESSION[$key];                  // to get the key
        }else{
            return $default;
        }
    }

    public static function set($key,$value){
        print_r("key:".$key,"value:".$value);
        $_SESSION[$key]=$value;         // to receive the value by the key

    }
}
