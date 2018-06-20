CREATE DATABASE SISTEMAEVALUACION;

USE SISTEMAEVALUACION;

/*Esta tabla manejara los roles de usuario (permisos etc...)*/
CREATE TABLE Rol(
  IDRolI INT AUTO_INCREMENT,
  NombreV VARCHAR(25),
  DescripcionV VARCHAR(50),
  PalabraClaveV CHAR(3),
  CONSTRAINT PK_IDRolI PRIMARY KEY(IDRolI)
);

CREATE TABLE Usuario(
  IDUsuarioI INT AUTO_INCREMENT,
  UsuarioV VARCHAR(50) NOT NULL,
  PasswordV VARCHAR(25) NOT NULL,
  IDRolI INT,
  CONSTRAINT PK_IDUsuarioI PRIMARY KEY(IDUsuarioI),
  CONSTRAINT FK_IDRolI FOREIGN KEY (IDRolI) REFERENCES Rol(IDRolI)
);

INSERT INTO Rol(NombreV, DescripcionV, PalabraClaveV) VALUES('Edgar Ramirez', 'CEO ERSys', 'adm');
INSERT INTO Usuario(UsuarioV, PasswordV, IDRolI) VALUES('admin', 'admin', 1);