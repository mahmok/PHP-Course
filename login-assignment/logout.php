<?php 

    
    if ( isset( $_COOKIE[session_name()] ) )
    {
        setcookie( session_name(), null, time()-3600, "/" );
    }

    //clear session from globals
    $_SESSION = array();
    unset($_COOKIE['saved_username']);
    $_SESSION = array();
    setcookie("saved_username", null, time()-29999, "/");
    session_destroy();
    header("Location: index.php");


?>