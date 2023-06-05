CREATE DATABASE gestao_financeira;
USE gestao_financeira;

CREATE TABLE usuario(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(110),
    senha VARCHAR(60)
);

CREATE TABLE compra(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    preco INT,
    dt_compra DATE,
    ds_compra LONGTEXT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES usuario(cd)
);

-- Gastos do último mês
SELECT MONTH(dt_compra) AS mes, SUM(preco) AS preco FROM compra WHERE id_user = 1 GROUP BY mes;

-- Gastos da último ano
SELECT YEAR(dt_compra) AS ano, SUM(preco) AS preco FROM compra WHERE  id_user = 1 GROUP BY ano;

-- Gastos da última semana
SELECT SUM(preco) AS preco FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND  id_user = 1;

-- Listar compras da última semana
SELECT * FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND  id_user = 1;

-- Listar compras do último mês
SELECT * FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND id_user = 1;

SELECT SUM(preco) AS preco, MONTH(dt_compra) AS mes FROM compra WHERE dt_compra >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND id_user = 1;