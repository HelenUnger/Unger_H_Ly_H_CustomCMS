<?php 
    //requires needed files 
    require_once('scripts/config.php');
    //function that checks if login session is valid
    valid_session();
    //if all is good, the user will not be redirected away from here.
?>

<!-- Dashboard -->

<?php include('../templates/head.php');?>
<link rel="stylesheet" href="../style/main.css">

<section class="dashboard">

<?php include('../templates/sidebar.php');?>

<div class="db-content">
    <h1>Admin Dashboard</h1>
    
    <?php if(date("a") == "am"){?>
        <h2>GOOD MORNING</h2>
    <?php }else if (date("a") == "pm"){?>
        <h2>GOOD AFTERNOON</h2>
    <?php } ?>

    <p><?php date_default_timezone_set("America/Toronto"); echo date("h:i:s a");?></p>
    
</div>

</section>

<?php include('../templates/foot.php');?>




    <!-- make custom dashboard, create stuff for homepage? add fake links make look cool -->
    <!-- different messages according to what time of day it is -->
    <!-- display last login date -->
