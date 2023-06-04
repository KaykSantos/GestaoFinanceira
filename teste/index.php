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
        <p>Gestão Financeira</p>
        <div>
            <a href="../compras"><?php echo $_SESSION['id_user']; ?></a>
        </div>
    </header>
    <main>
        <div id="div-left">
            <form method="POST">
                <h2>Cadastrar compra</h2>
                <input type="text" id="name" name="name" placeholder="Nome da compra:">
                <input type="number" id="preco" name="preco" placeholder="Preço:">
                <label for="date">Data da compra:</label>
                <input type="date" id="date" name="date">
                <input type="text" name="desc" id="desc" placeholder="Descrição da compra (opcional)">
                <button name="submit">Cadastrar</button>
            </form>
        </div>
        <div id="div-right">
            <div id="list">
                <?php
                    $query = "SELECT * FROM compra WHERE id_user ORDER BY cd DESC";
                ?>
            </div>
        </div>
    </main>
    <footer>
        <p>Todos direitos reservados</p>
    </footer>
</body>
</html>