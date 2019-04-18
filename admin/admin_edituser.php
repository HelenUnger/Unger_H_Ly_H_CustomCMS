<?php 
    require_once('scripts/connect.php');
    require_once('scripts/config.php');
    //check if user is logged in
    valid_session();

    //check to see if form was submitted
    if(isset($_POST['submit'])){
        //set variables, remove space afterwards
        $name = trim($_POST['username']);
        $email = trim($_POST['email']);

        //validation
        if(empty($name) || empty($email)){
            $message = 'Please fill in all the fields!';
        }else{
            //edit user
            $result = editUser($name, $email);
            $message = $result;
        }
    }

    //collect the information from the database
    $id = $_SESSION['user_id'];

    $query = 'SELECT * FROM tbl_user WHERE user_id = :id';

    $found_user_set = $pdo->prepare($query);
    $result = $found_user_set->execute(
        array(
            ':id' => $id
            )
        );
    //after the info is collected it gets moved into the form values

    
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

        <h2>Update Your Account</h2>

        <form action="admin_edituser.php" method="POST">
        <?php if($found_user = $found_user_set->fetch(PDO::FETCH_ASSOC)): ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo($found_user['user_name']); ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo($found_user['user_email']); ?>">
        <?php endif; ?>

            <button type="submit" name="submit" >Update</button>
        </form>
    </div>

</section>

<?php include('../templates/foot.php');?>