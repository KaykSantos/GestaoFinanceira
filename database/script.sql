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