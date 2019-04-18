<?php 
    //has to get the logout function from sessions
    require_once('sessions.php');

    //checks to see if the caller id is set in the get request
    if(isset($_GET['caller_id'])){
        $action = $_GET['caller_id'];

        //checks if the get request was "logout" if it was, run the logout function
        switch($action){
            case 'logout':
                log_out();
                break;
        }
    }

    ?>