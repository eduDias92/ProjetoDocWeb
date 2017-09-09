create database docwebDB;

use docwebDB;
alter database docwebdb charset = utf8 collate = utf8_general_ci;

CREATE TABLE cliente (
    codCliente INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    idEndereco INT NOT NULL,
    idContato INT NOT NULL,
    serialTI INT NOT NULL,
    serialNG INT,
    serialDOS INT,
    cenario VARCHAR(256),
    compartilhamentos VARCHAR(256),
    PRIMARY KEY (codCliente)
);


CREATE TABLE endereco (
    idEndereco INT NOT NULL AUTO_INCREMENT,
    codCliente INT NOT NULL,
    rua VARCHAR(50) NOT NULL,
    numero INT NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    uf VARCHAR(2) NOT NULL,
    PRIMARY KEY (idEndereco),
    FOREIGN KEY (codCliente)
        REFERENCES cliente (codCliente)
);

CREATE TABLE contato (
    idContato INT NOT NULL AUTO_INCREMENT,
    codCliente INT NOT NULL,
    email VARCHAR(70) NOT NULL,
    telefone1 INT NOT NULL,
    telefone2 INT NOT NULL,
    PRIMARY KEY (idContato),
    FOREIGN KEY (codCliente)
        REFERENCES cliente (codCliente)
);

CREATE TABLE servidor (
    idServidor INT NOT NULL AUTO_INCREMENT,
    codCliente INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    Tipo VARCHAR(6) NOT NULL,
    ipInterno VARCHAR(25) NOT NULL,
    antivirus VARCHAR(30),
    SO VARCHAR(50) NOT NULL,
    hardware VARCHAR(100),
    discos VARCHAR(50),
    servicos VARCHAR(100),
    PRIMARY KEY (idServidor),
    FOREIGN KEY (codCliente)
        REFERENCES cliente (codCliente)
);

CREATE TABLE dominio (
    idDominio INT NOT NULL AUTO_INCREMENT,
    codCliente INT NOT NULL,
    nomeDominio VARCHAR(70) NOT NULL,
    ipServidor VARCHAR(25),
    PRIMARY KEY (idDominio),
    FOREIGN KEY (codCliente)
        REFERENCES cliente (codCliente)
);

CREATE TABLE UsuariosAdms (
    idUsuario INT NOT NULL AUTO_INCREMENT,
    idDominio INT NOT NULL,
    usuario VARCHAR(30),
    senha VARCHAR(30),
    PRIMARY KEY (idUsuario),
    FOREIGN KEY (idDominio)
        REFERENCES dominio (idDominio)
);

CREATE TABLE modem (
    idModem INT NOT NULL AUTO_INCREMENT,
    codCliente INT NOT NULL,
    ipModem VARCHAR(25) NOT NULL,
    usuario VARCHAR(25),
    senha VARCHAR(25),
    servicos VARCHAR(50),
    rangeDhcp VARCHAR(50),
    PRIMARY KEY (idModem),
    FOREIGN KEY (codCliente)
        REFERENCES cliente (codCliente)
);

CREATE TABLE impressora (
    idImpressora INT NOT NULL AUTO_INCREMENT,
    codCliente INT NOT NULL,
    conexao VARCHAR(25),
    PRIMARY KEY (idImpressora),
    FOREIGN KEY (codCliente)
        REFERENCES cliente (codCliente)
);

CREATE TABLE login (
    idUsuario INT NOT NULL AUTO_INCREMENT,
    nomeUser VARCHAR(50) NOT NULL,
    senha VARCHAR(15) NOT NULL,
    estado BOOLEAN NOT NULL,
    adm BOOLEAN NOT NULL,
    PRIMARY KEY (idUsuario)
);

alter table login modify column idUsuario int not null auto_increment;

/* Inserindo dados de login*/


insert into login values (1,'eduardo','1234',1,1);
insert into login (nomeUser, senha, estado, adm) values ('mastermaq','1234',1,0);

insert into login (nomeUser, senha, estado, adm) values ('teste','1234',1,0);
insert into login (nomeUser, senha, estado, adm) values ('user','1234',1,0);




