<?php 
include('database/database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = htmlspecialchars(trim($_POST['id']));
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE usuarios SET nome='$nome',email='$email', senha='$senha' WHERE id='$id'";
    if(mysqli_query($con,$sql)){
        echo '<div class="alert alert-success">Usuário Alterado com sucesso!</div>';
    }else{
        echo 'erreur'.mysqli_error($con);
    }