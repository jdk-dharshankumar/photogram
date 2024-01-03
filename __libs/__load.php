<? 
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/Sessions.class.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/User.class.php';

Sessions::start();

function load_temp($name){
    
    include "/photogram/__libs/__templates/_$name.php";
}

?>


 

