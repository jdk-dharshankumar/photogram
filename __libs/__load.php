<? 
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/Sessions.class.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/User.class.php';

global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');

Sessions::start();


function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}


function load_temp($name){
    
    include "__templates/$name.php";
}

?>





 

