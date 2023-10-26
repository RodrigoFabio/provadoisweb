<?php
require "database.php";
class LivroRepository {

    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getAllLivros() {
        $livros = array();

        $sql = "SELECT * FROM livro";
        $result = $this->mysqli->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $livros[] = $row;
            }
        }
        return $livros;
    }

    public function BuscaLivroById(int $id) {
        $sql = "SELECT * FROM livro WHERE LivroId = ?";
        $statement = $this->mysqli->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();
    
        $result = $statement->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // ou qualquer outro valor padrão que você queira retornar quando o livro não for encontrado
        }
    }
    

     public function deletarLivro(int $id) 
     {
      $sql = "DELETE FROM livro WHERE LivroID = ?";
      $statement = $this->mysqli->prepare($sql);
      $statement->bind_param("i", $id);
  
      if ($statement->execute()) {
          return true; 
      } else {
          return false; 
      }
    }

    public function salvarLivro(string $titulo, string $autor, int $anoPublicacao, string $editora, int $genero, DateTime $dataCadastro, string $disponivel) {
        $sql = "INSERT INTO livro (Titulo, Autor, AnoPublicacao, Editora, GeneroId, DataCadastro, Disponivel) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->mysqli->prepare($sql);
    
        // Defina os tipos de dados e ligue as variáveis
        $dataCadastroFormat = $dataCadastro->format('Y-m-d'); // Formate a data antes de passá-la
        $statement->bind_param('ssissis', $titulo, $autor, $anoPublicacao, $editora, $genero, $dataCadastroFormat, $disponivel);
    
        // Execute a instrução
        $statement->execute();
    }
    
    public function validaUser(string $usuario, string $senha){
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
        
        $statement = $this->mysqli->prepare($sql);
        
        if (!$statement) {
            throw new Exception("Erro na preparação da consulta: " . $this->mysqli->error);
        }
        
        $statement->bind_param("ss", $usuario, $senha);
    
        $statement->execute();
    
        $result = $statement->get_result();
    
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function editarLivro(int $LivroID, string $titulo, string $autor, int $anoPublicacao, string $editora, int $genero, DateTime $dataCadastro, string $disponivel) {
        $sql = "UPDATE livro SET Titulo = ?, Autor = ?, AnoPublicacao = ?, Editora = ?, GeneroId = ?, DataCadastro = ?, Disponivel = ? WHERE LivroID = ?";
        $statement = $this->mysqli->prepare($sql);
        
        if (!$statement) {
            throw new Exception("Erro na preparação da consulta: " . $this->mysqli->error);
        }
        
        $statement->bind_param('ssissisi', $titulo, $autor, $anoPublicacao, $editora, $genero, $dataCadastro->format('Y-m-d'), $disponivel, $LivroID);

        $statement->execute();
    }
    
}
    
