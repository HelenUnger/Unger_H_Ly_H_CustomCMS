<?php
	require_once('scripts/config.php');
    valid_session();

    $result = deleteProduct($_GET['deleteProduct']);
    $message = $result;
    
?>