CREATE DATABASE cortesia CHARACTER SET utf8 COLLATE utf8_general_ci;
USE cortesia;
CREATE TABLE TIPO(
    IdTipo INT PRIMARY KEY AUTO_INCREMENT,
    NombrePerfil varchar(100) NOT NULL
);
CREATE TABLE USUARIOS(
    IdUsuario INT PRIMARY KEY AUTO_INCREMENT,
    IdTipoUsuario INT,
    NickName varchar(50) NOT NULL,
    UsuarioPassword varchar(80) NOT NULL,
    FOREIGN KEY TIPO (IdTipoUsuario) REFERENCES TIPO (IdTipo)
);