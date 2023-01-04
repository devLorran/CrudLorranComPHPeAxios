<?php 
include('database/database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    $sql = 'SELECT * FROM usuarios';
    $results = mysqli_query($con,$sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nome'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['senha'].'</td>
                    <td><a onclick="getContact('.$row['id'].')" title="update" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></td>
                    <td><a onclick="deleteContact('.$row['id'].')" title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
                </tr>
            ';
        }
    }else{
        return false;
    }