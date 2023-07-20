CREATE DATABASE cortesias CHARACTER SET utf8 COLLATE utf8_general_ci;

USE cortesias;

CREATE TABLE rolperfil_01(
    PerfilId INT PRIMARY KEY AUTO_INCREMENT,
    NombrePerfil varchar(50) NOT NULL
);

INSERT INTO
    rolperfil_01 (`PerfilId`, `NombrePerfil`)
VALUES
    (NULL, 'Asesor'),
    (NULL, 'Gerente General'),
    (NULL, 'Dirección General'),
    (NULL, 'Área de TI');

CREATE TABLE usuario_01(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Perfil INT,
    Nombre varchar(100) NOT NULL,
    Apellidos varchar(150) NOT NULL,
    Fecha_de_nacimiento date,
    Nick_name varchar(50) NOT NULL,
    Contrasena varchar(80) NOT NULL,
    CONSTRAINT rolperfil_01_FK FOREIGN KEY (Perfil) REFERENCES rolperfil_01(PerfilId)
);

CREATE TABLE perfil_01(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Usuario_id INT UNIQUE,
    Foto varchar(100) NOT NULL,
    Telefono INT,
    CONSTRAINT usuario_01_FK FOREIGN KEY (Usuario_id) REFERENCES usuario_01(Id)
);

CREATE TABLE depositos_01(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Afiliado_id INT,
    Saldo INT,
    Fecha_de_deposito date
);

CREATE TABLE cliente_01(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    REFERENCIA_AFI varchar(50),
    REFERENCIA_AH varchar(50),
    PATERNO varchar(50),
    MATERNO varchar(50),
    NOMBRES varchar(50),
    SEXO varchar(50),
    MUNICIPIO varchar(50),
    SALDO varchar(50)
);

CREATE TABLE cortesias_01(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Usuario_id INT,
    referenciacliente VARCHAR(50) NOT NULL,
    Tipo_cortesia varchar(50),
    Descripcion TEXT,
    CONSTRAINT usuario_01_corteFK FOREIGN KEY (Usuario_id) REFERENCES usuario_01(Id)
);

CREATE TABLE colaborador(
    Id_colaborador INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_colaborador varchar(50),
    Apellidos varchar(50)
);

CREATE TABLE cancelaciones(
    id_cancelacion_ahorros INT PRIMARY KEY AUTO_INCREMENT,
    estatus BOOLEAN NOT NULL DEFAULT FALSE,
    Nombre_afiliado VARCHAR(250) NOT NULL,
    referencia VARCHAR(100) NOT NULL,
    email CHARACTER(150) NOT NULL,
    telefono VARCHAR(12) NOT NULL,
    total_ahorro DECIMAL(18, 6) NOT NULL,
    tipo_cancelacion VARCHAR(150) NOT NULL,
    fecha DATE NOT NULL
);

CREATE TABLE Afiliado(
    Id_afiliado INT PRIMARY KEY AUTO_INCREMENT,
);

CREATE TABLE liquidacion(
    Id_liquidacion INT PRIMARY KEY AUTO_INCREMENT,
    Afiliado_li INT,
    CONSTRAINT Afiliado_FK FOREIGN KEY (Afiliado_li) REFERENCES Afiliado(Id_afiliado)
);