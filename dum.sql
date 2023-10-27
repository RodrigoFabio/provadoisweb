create database provadoisdb;
use provadoisdb;

CREATE TABLE `livro` (
  `LivroID` INT AUTO_INCREMENT PRIMARY KEY,
  `Titulo` VARCHAR(255) NOT NULL,
  `Autor` VARCHAR(100) DEFAULT NULL,
  `AnoPublicacao` INT DEFAULT NULL,
  `Editora` VARCHAR(100) DEFAULT NULL,
  `GeneroId` INT DEFAULT NULL,
  `DataCadastro` DATE DEFAULT NULL,
  `Disponivel` VARCHAR(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table usuarios(
id INT AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(255) NOT NULL,
senha VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table generoLiterario(GeneroId INT AUTO_INCREMENT PRIMARY KEY, genero VARCHAR(255));

INSERT INTO usuarios (usuario, senha) VALUES
('usuario2', 'senha2'),
('usuario3', 'senha3');

INSERT INTO livro (Titulo, Autor, AnoPublicacao, Editora, GeneroId, DataCadastro, Disponivel)
VALUES ('Aventuras no Espaço', 'José Silva', 2005, 'Editora Estelar', 1, '2005-08-15', 1);

INSERT INTO livro (Titulo, Autor, AnoPublicacao, Editora, GeneroId, DataCadastro, Disponivel)
VALUES ('O Mistério do Relógio', 'Maria Alves', 2018, 'Editora Enigma', 4, '2018-04-22', 1);

INSERT INTO livro (Titulo, Autor, AnoPublicacao, Editora, GeneroId, DataCadastro, Disponivel)
VALUES ('Segredos do Passado', 'Carlos Santos', 2010, 'Editora Misteriosa', 3, '2010-11-30', 1);

INSERT INTO livro (Titulo, Autor, AnoPublicacao, Editora, GeneroId, DataCadastro, Disponivel)
VALUES ('O Último Reino', 'Ana Oliveira', 2015, 'Editora Medieval', 2, '2015-06-10', 1);

INSERT INTO livro (Titulo, Autor, AnoPublicacao, Editora, GeneroId, DataCadastro, Disponivel)
VALUES ('Cidades Invisíveis', 'Marco Polo', 1972, 'Editora Fantasia', 5, '1972-03-19', 1);





