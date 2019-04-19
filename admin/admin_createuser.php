<?php 
    require_once('scripts/config.php');
    //check if user is logged in
    // valid_session();

    //check to see if form was submitted
    if(isset($_POST['submit'])){
        //remove spaces after or before the input
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        //validation
        if(empty($name) || empty($email) || empty($password)){
            $message = 'Please fill in the required fields!';
        }else{
            //send theinfo to the create user function
            $result = createUser($name, $email, $password);
            //return any messages
            $message = $result;
        }
    }
?>


<?php include('../templates/head.php');?>
<link rel="stylesheet" href="../style/main.css">

<section class="dashboard">

    <?php include('../templates/sidebar.php');?>

    <div class="db-content create-user">
        <?php if(!empty($message)):?>
        <div class="error-container <?php if($message == "success"){echo "success";}?>">
        <p><?php echo $message; ?></p>
        </div>
        <?php endif ?>

        <h2>Create New User</h2>

        <form action="admin_createuser.php" method="POST">
            <label for="name">First Name:</label>
            <input type="text" id="name" name="name" value="">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="">

            <button type="submit" name="submit" >Add User</button>
        </form>
    </div>

</section>
