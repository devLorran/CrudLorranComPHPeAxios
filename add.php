<?php 
include('database/database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
//decode json data
$_POST = json_decode(file_get_contents('php://input'), true);
if(isset($_POST) && !empty($_POST) && !empty($_POST)){
    $nome =     $_POST['nome'];
    $email =    $_POST['email'];
    $senha =    $_POST['senha'];

    $query = "INSERT INTO usuarios (  nome , email, senha ) VALUES ('$nome','$email', '$senha')";
        if(mysqli_query($con,$query)){
            echo '<div class="alert alert-success">usuário criado</div>';
        }else{
            echo 'error'.mysqli_error($con);
        }

}