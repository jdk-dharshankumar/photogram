<pre>
<?include "__libs/__load.php";

$result=null;


if(isset($_GET['logout'])){
    Sessions::destroy();
    die("sessions destroyed ");     //to logout the current sessions
}

if(Sessions::get('is_loggedin')){
    $username=Sessions::get('session_user');   // to check sessions is already in use or already created
    print("welcome back,[$username]");
    $result=$username;

}else{
    $user = "sagarjd";
    $pass = "ss18jd12";
    $result = User::login($user,$pass);
    if($result){
        echo 'login succesful';
        Sessions::set('is_loggedin',true);          // to inform login is succseful
        Sessions::set('session_user',$result);
    }else{
        echo 'Incorrect Password';
    }
}

// $sol=Us()er::login($user, $pass);
// if($sol){
//     echo 'login succesful';
//     Sessions::set('is_logedin',true);          // to inform login is succseful
//     Sessions::set('session_user',$result);
// }else{
//     echo '<br>'.'login failed';
// }






?>
</pre>