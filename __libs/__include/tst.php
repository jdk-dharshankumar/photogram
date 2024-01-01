<?

include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/Mic.class.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/Sessions.class.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/photogram/__libs/__include/User.class.php';


// $mic1 = new mic ();
// $mic2 = new mic ();

// $mic1 -> brand = "apple";
// $mic2 -> brand = "tata";       //to print starightly the obj values
// print("\n".$mic2 -> brand );
// print("\n".$mic1 -> brand );

// $mic1-> getbrand("apple");
// $mic2-> getbrand("tata");
// print("\n".$mic1 -> brand);
// print("\n".$mic2 -> brand);         //to print obj using the function in cls file

// $mic1 -> setmodel("abcdef");
// printf("\n"."reversed of model is ".$mic1->getmodel()); //to print obj model using 2 fun's in class file

// mic::test(); // it if for clling the static function

// $con=database::getconnection();

// Sessions::start();

// if(Sessions::start()){
//     print("seesions starts".  '<br>'.'<br>');    //prints sessin is stared 
// } else{
//     print("already started".  '<br>'.'<br>');   
// }

// if (Sessions::isset($a));
//     print("already exisiting...".  '<br>'.'<br>');    // checks if the value a is alreay there are not

// if (Sessions::destroy());
//     print("destroyed succesfully");   //destroy the whole sessions with the function

$user='dharshan';
$pass='password';
$result=null;

if(isset($_GET['logout'])){
    sessions::destroy();
    die("sessions destroyed ");     //to logout the current sessions
}

if(sessions::get('is_logedin')){
    $userdata=sessions::get('session_user');   // to check sessions is already in use or already created
    print("welcome back, $username[$user]");
    $result=$userdata;
}else{
    print("no sessions found");
    $result=user::login($user,$pass);
}

$sol=user::login($user, $pass);
if($sol){
    echo 'login succesful';
    sessions::set('is_logedin',true);          // to inform login is succseful
    sessions::set('session_user',$result);
}else{
    echo 'login failed';
}






?>