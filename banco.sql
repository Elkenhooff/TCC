CREATE DATABASE chefconnect;
USE chefconnect;

CREATE TABLE clientes (
  cli_id int(11) NOT NULL AUTO_INCREMENT,
  cli_nome varchar(150) NOT NULL,
  cli_email varchar(100) NOT NULL,
  cli_senha varchar(50) NOT NULL,
  cli_seguranca varchar(50) NOT NULL,
  cli_ativo char(1) NOT NULL,
  PRIMARY KEY (cli_id)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE funcionarios (
  func_id int(11) NOT NULL AUTO_INCREMENT,
  func_nome varchar(150) NOT NULL,
  func_email varchar(100) NOT NULL,
  func_senha varchar(50) NOT NULL,
  func_seguranca varchar(50) NOT NULL,
  func_ativo char(1) NOT NULL,
  PRIMARY KEY (func_id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;