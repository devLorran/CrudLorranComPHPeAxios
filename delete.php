<?php 
include('database/database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = htmlspecialchars(trim($_POST['id']));
    $sql = "DELETE FROM usuarios WHERE id='$id'";
    if(mysqli_query($con,$sql)){
        echo '<div class="alert alert-success">Contact Deleted</div>';
    }else{
        echo 'erreur'.mysqli_error($con);
    }