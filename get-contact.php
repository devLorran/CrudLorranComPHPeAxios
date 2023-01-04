<?php 
include('database/database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = htmlspecialchars(trim($_POST['id']));
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $results = mysqli_query($con,$sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            echo json_encode($row);
        }
    }else{
        return false;
    }