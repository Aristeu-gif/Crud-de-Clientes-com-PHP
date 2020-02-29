<?php
session_start();
require_once 'db_connect.php';

//clear
function clear($input){

    global $connect;
    $var = mysqli_escape_string($connect,$input);
    $var = htmlspecialchars($var);
    return $var;

}

if(isset($_POST['btn-cadastrar'])):
    $name = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);

    
    $sql="INSERT INTO Clientes(nome,sobrenome,email,idade) values ('$name','$sobrenome','$email','$idade')";

    if(mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Cadastrado realizado com sucesso";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Ocorreu um erro ao realizar o cadastro";
        header('Location : ../index.php');
        
    endif;
endif;
