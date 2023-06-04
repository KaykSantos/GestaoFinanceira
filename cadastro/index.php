<?php
    include('../php/config.php');
    if($_POST){
        if(isset($_POST['submit'])){
            Cadastrar($_POST['name'], $_POST['email'], $_POST['password']);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section>
            <form method="POST">
                <h2>Cadastro</h2>
                <input type="text" id="name" name="name" placeholder="Nome:">
                <input type="email" id="email" name="email" placeholder="Email:">
                <input type="passwowrd" id="password" name="password" placeholder="Senha:">
                <button name="submit">Enviar</button>
                <p>Já possui conta? <a href="../login/">Faça login!</a></p>
            </form>
        </section>
    </main>
</body>
</html>