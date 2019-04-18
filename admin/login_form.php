<?php
//login in form page

    //requires the config file containing other necessary scripts
    require_once('scripts/config.php');

    //checks to see if the username and password in the form was created AND filled out (not empty)
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        //collects the username and password submitted through a post request
        $username = $_POST['username'];
        $password = $_POST['password'];

        //sends the login credentials to the login function (jumps to config and then finds the file that contains the function)
        //if there ware any errors the function will send back a message, then is stored in the errors variable
        $errors = login($username, $password);

        //if the login form isnt even filled out and the user tries to submit it this will send an error to the error loop found above the form
    }else if (isset($_POST['username']) || isset($_POST['password'])){
        $errors = 'please fill in the required fields';
    }
?>




<?php include('../templates/head.php');?>
<link rel="stylesheet" href="../style/main.css">

<section class="page">
    <!-- checks to see if there are any arrors present, if there are, then echo them out -->
    
    <?php if(!empty($errors)):?>
    <div class="error-container">
    <p><?php echo $errors; ?></p>
    </div>
    <?php endif ?>
    

    <!-- when submitted, the file will reload and send the inputs through a post request, being caught at the top and passed through the function -->
    
    
    
    <div class="form-container">
    <form action="login_form.php" method="POST">

        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">

        <button type="submit">Log In!</button>
    </form>
    </div>

</section>

<?php include('../templates/foot.php');?>






    <!-- make a mini register form, style the forms, add error styles -->
