<?php
session_start();

define('DB', 'gestao_financeira');
define('USER', 'root');
define('PASS', '');
define('HOST', 'localhost');

$conn = mysqli_connect(HOST, USER, PASS, DB) or die ("Não foi possível se conectar ao banco!");

// CRUD de usuário 
function Login($email, $password){
    $hash = md5($password);
    $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$hash'";
    $result = $GLOBALS['conn']->query($query);
    if($result){
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id_user'] = $user['cd'];
            header('Location: ../home');
        }else{
            echo "Email e/ou senha inválidos! Verifique os dados digitados e tente novamente.";
        }
    }else{
        echo "Erro ao executar login!";
    }
}

function Cadastrar($name, $email, $password){
    $query = "SELECT email FROM usuario WHERE email = '$email'";
    $result = $GLOBALS['conn']->query($query);
    if($result){
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            echo "Email já utilizado! Tente fazer login ou utilize outro email.";
        }else{
            $query = "INSERT INTO usuario VALUES (null, '$name', '$email', md5('$password'))";
            $result = $GLOBALS['conn']->query($query);
            if($result){
                echo "Cadastro realizado com sucesso!";
            }else{
                echo "Erro ao realizar cadastro";
            }
        }
    }
}

function CadastrarCompra($name, $preco, $date, $desc){
    $query = 'INSERT INTO compra VALUES (null, "'.$name.'", '.$preco.', "'.$date.'", "'.$desc.'", '.$_SESSION['id_user'].')';
    $result = $GLOBALS['conn']->query($query);
    if($result){
        header('Location: ../home');
    }
}