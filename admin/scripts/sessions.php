<?php
    //starts the session
    session_start();

    //function thats called from the begining of the dashboard to check if login is valid
    function valid_session(){
        //if the sessions user_id wasnt set then taht means the credentals were wrong
        if(!isset($_SESSION['user_id'])) {
            //now the user is sent back to the login form
            redirect_to('login_form.php');
        }
    }

    //log out funtion
    function log_out(){
        //kills the session requiring user to log in again to reactivate it
        session_destroy();

        //after session is destroyed send the user back to the login page
        redirect_to('./login_form.php');
    }


?>