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
        <div id="div-left">
            <div id="menu">
                <?php
                    $query = 'SELECT * FROM compra WHERE id_user = '.$_SESSION['id_user'].' ORDER BY cd DESC';
                    $result = $GLOBALS['conn']->query($query);
                    $rows = mysqli_num_rows($result);
                    if($rows > 0){
                        echo "<h2>Gastos:</h2>";
                        $query = 'SELECT SUM(preco) AS preco FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND  id_user = '.$_SESSION['id_user'];
                        $result = $GLOBALS['conn']->query($query);
                        foreach($result as $row){
                            echo "<h3>Última semana: ".$row['preco']." reais <br>(<a href='?week=1'>Ver compras</a>)</h3>";
                        }

                        $query = 'SELECT SUM(preco) AS preco, MONTH(dt_compra) AS mes FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND id_user = '.$_SESSION['id_user'];
                        $result = $GLOBALS['conn']->query($query);
                        foreach($result as $row){
                            echo "<h3>Último mês: ".$row['preco']." reais <br>(<a href='?month=1'>Ver compras</a>)</h3>";
                        }

                        $query = 'SELECT SUM(preco) AS preco FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH) AND id_user = '.$_SESSION['id_user'];
                        $result = $GLOBALS['conn']->query($query);
                        foreach($result as $row){
                            echo "<h3>Último bimestre: ".$row['preco']." reais </h3>";
                        }

                        $query = 'SELECT SUM(preco) AS preco FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND id_user = '.$_SESSION['id_user'];
                        $result = $GLOBALS['conn']->query($query);
                        foreach($result as $row){
                            echo "<h3>Último trimestre: ".$row['preco']." reais </h3>";
                        }

                        $query = 'SELECT SUM(preco) AS preco FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) AND id_user = '.$_SESSION['id_user'];
                        $result = $GLOBALS['conn']->query($query);
                        foreach($result as $row){
                            echo "<h3>Último semestre: ".$row['preco']." reais </h3>";
                        }
                        
                        $query = 'SELECT SUM(preco) AS preco FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND id_user = '.$_SESSION['id_user'];
                        $result = $GLOBALS['conn']->query($query);
                        foreach($result as $row){
                            echo "<h3>Último ano: ".$row['preco']." reais </h3>";
                        }

                        echo "
                            <hr>
                            <h2></h2>
                        ";


                    }else{
                        echo "Comece a cadastrar suas compras para poder ver os resultados";
                    }
                ?>  
            </div>
        </div>
        <div id="div-right">
            <div id="list">
                <?php
                    if($_GET){
                        $query = "";
                        if(isset($_GET['week'])){
                            $query = 'SELECT * FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND  id_user = '.$_SESSION['id_user'].' ORDER BY dt_compra DESC';
                        }else if(isset($_GET['month'])){
                            $query = 'SELECT * FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND  id_user = '.$_SESSION['id_user'].' ORDER BY dt_compra DESC';
                        }
                        
                        $result = $GLOBALS['conn']->query($query);
                        $rows = mysqli_num_rows($result);
                        if($rows > 0){
                            foreach($result as $row){
                                $dt_compra = date('d/m/Y',  strtotime($row['dt_compra']));
                                $ds_compra = $row['ds_compra'];
                                if($row['ds_compra'] == ""){
                                    $ds_compra = "Não cadastrada";
                                }
                                echo '
                                    <div class="compra">
                                        <div>
                                            <p>Compra: '.$row['nome'].'</p>
                                            <p>Preço: '.$row['preco'].'</p>
                                            <p>Data: '.$dt_compra.'</p>
                                        </div>
                                        <div>
                                            <p>Descrição: '.$ds_compra.'</p>
                                        </div>
                                    </div>  
                                ';
                            }
                        }else{
                            echo "Não há compras cadastradas!";
                        }   
                    }
                ?>
                <!-- 
                <div class="compra">
                    <div>
                        <p>Compra: '.$row['nome'].'</p>
                        <p>Preço: '.$row['preco'].'</p>
                        <p>Data: '.$dt_compra.'</p>
                    </div>
                    <div>
                        <p>Descrição: '.$ds_compra.'</p>
                    </div>
                </div>    
                -->
            </div>
        </div>
    </main>
    <footer>
        <p>Todos direitos reservados</p>
    </footer>
</body>
</html>