<?php
    include('../php/config.php');
    if($_POST){
        if(isset($_POST['submit'])){
            CadastrarCompra($_POST['name'], $_POST['preco'], $_POST['date'], $_POST['desc']);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <p>Compras</p>
        <div>
            <a href="../home">Voltar</a>
        </div>
    </header>
    <main>
        <section>
            
        </section>
    </main>
    <footer>
        <p>Todos direitos reservados</p>
    </footer>
</body>
</html>