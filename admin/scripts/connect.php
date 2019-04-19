<?php
//database connection file

//array of information needed to connect to correct database
$db_dsn = array(
    'host' => 'localhost',
    'dbname' => 'db_sportchek',
    'charset' => 'utf8'
);

//creates information the pdo needs to connect to the database
$dsn = 'mysql:' . http_build_query($db_dsn, '', ';');

//set up connection credentials
$db_user = 'root';
$db_pass = 'root';

//checks to see if connection was a success, if it wasnt throw back a connection error
try{
    $pdo = new PDO($dsn, $db_user, $db_pass);
}catch(PDOException $exception){
    echo 'Connection Error: ' . $exception->getMessage();
    exit();
}
?>