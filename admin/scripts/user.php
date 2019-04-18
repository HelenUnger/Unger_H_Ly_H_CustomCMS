<?php 

    function createUser($name, $email, $password){
        include('connect.php');

        //encrypt password
        $encrypt = password_hash($password, PASSWORD_BCRYPT);
        var_export($encrypt);

        //create new user query using placeholders
        $create_user_query = "INSERT INTO tbl_user (user_name, user_email, user_pass) VALUES (:fname, :email, :pass)";

        //prepare and exicute query using the variables in the lower array
        $create_user_set = $pdo->prepare($create_user_query);
        $result = $create_user_set->execute(
            array(
                ':fname'=>$name,
                ':email'=>$email,
                ':pass'=>$encrypt,
                )
        );

        //if some thing was created/updated.. then:
        if($create_user_set->rowCount()){
            //send email to new user
            $message = 'success';
            //$message = send_email($name, $email);
            return $message;
        }else{
            //there was an error
            $message = 'something failed';
            return $message;
        }

    }


    function edituser($name, $email){
        include('connect.php');

        $id = $_SESSION['user_id'];

        $update_user_query = 'UPDATE tbl_user SET user_name = :username, user_email = :email WHERE user_id = :id';
        $update_set = $pdo->prepare($update_user_query);
        $result = $update_set->execute(
            array(
                ':username'=>$name,
                ':email'=>$email,
                ':id'=>$id
                )
        );

        //if some thing was created/updated.. then:
            if($update_set->rowCount()){
                //success
                $message = 'success';
                return $message;
            }else{
                //there was an error
                $message = 'something failed';
                return $message;
            }

    }



?>