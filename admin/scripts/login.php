<?php 

//logn in funtion that is called when a user tries to login
//passes submitted username and password and the ip address
function login($username, $password){
    require_once('connect.php');

    //query to check if user even exists
    $check_user_exist = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :usrnm';
    //prepared statement to avoid sql injection
    $matching_user = $pdo->prepare($check_user_exist);
    //pass actual values into the prepared statement
    $matching_user->execute(
        array(
            ':usrnm'=>$username
            )
    );

    //checks to make sure there is actually a user in the array before continuing (> 0 means at least one)
    if($matching_user->fetchColumn() > 0){
        //if there is a user with that username, find the user and their password
        $find_user_query = 'SELECT * FROM tbl_user WHERE user_name = :usrnm';
        //create prepared statement to avoid sql injection
        $user_result = $pdo->prepare($find_user_query);
        //pass actual values into the prepared statement
        $user_result->execute(
            array(
                ':usrnm'=>$username
                )
        );

        
        //as long as something came back from the database, 
        while($found_user = $user_result->fetch(PDO::FETCH_ASSOC)){
            $hash = $found_user['user_pass'];

            //add if here checking the hashed password
            if (password_verify($password, $hash)) {
                //sets id as the logged in user
                $id = $found_user['user_id'];

                //sets the sessions id as this users id (session hasnt been started yet, but the id needs to be set to show that theyre allowed to sign in)
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $found_user['user_name'];
            }
        }

        //if the id is empty that means the user with that password wasnt found and the variable couldnt be set, meaning the login failed since there was no user with the matching username and password in the database
        if(empty($id)){
            //create error message
            $errorMsg = 'Wrong Password';

            //returns the error message
            return $errorMsg;
        }

        //redirects to the dashboard that will right away check if the session is valid.. login continues there
        redirect_to('index.php');
        
    }else{
        //if no users match that username it returns this error
        $errorMsg = 'user does not exist';
        return $errorMsg;
    }
}

?>