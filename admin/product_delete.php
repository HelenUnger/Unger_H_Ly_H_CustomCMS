<?php
	require_once('scripts/config.php');
    valid_session();

    $result = deleteProduct($_GET['deleteProduct']);
    $message = $result;

    // //redirect back to list if there are no errors 
    // redirect_to('./product_list.php');
    
?>