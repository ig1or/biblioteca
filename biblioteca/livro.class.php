<?php
class Livro{
  private $codigo;
  private $titulo;
  private $genero;

  public function __construct($codigo, $titulo, $genero) {
    $this->codigo = $codigo;
    $this->titulo = $titulo;
    $this->genero = $genero;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function setCodigo($codigo) {
    $this->codigo = $codigo;
  }

  public function getNome() {
    return $this->titulo;
  }

  public function setNome($titulo) {
    $this->titulo = $titulo;
  }

  public function getMatricula() {
    return $this->genero;
  }

  public function setMatricula($genero) {
    $this->genero = $genero;
  }

  public function excluir() {
    require_once('conexao.php');

    $dsn = "mysql:host=localhost;dbname=classes";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        exit();
    }

    $sql = 'DELETE FROM livro WHERE codigo = :codigo';
    $comando = $pdo->prepare($sql);

    $comando->bindValue(':codigo', $this->codigo);

    if ($comando->execute()) {
        echo "Livro excluído com sucesso!";
    } else {
        echo "Erro ao excluir livro!";
    }
}

public function editar() {
  require_once('conexao.php');

  $dsn = "mysql:host=localhost;dbname=classes";
  $user = "root";
  $password = "";

  try {
      $pdo = new PDO($dsn, $user, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo "Erro: " . $e->getMessage();
      exit();
  }

  $sql = 'UPDATE livro SET titulo = :titulo, genero = :genero WHERE codigo = :codigo';
  $comando = $pdo->prepare($sql);

  $comando->bindValue(':titulo', $this->titulo);
  $comando->bindValue(':genero', $this->genero);
  $comando->bindValue(':codigo', $this->codigo);

  try {
      $comando->execute();
      echo "Livro atualizado com sucesso!";
  } catch (PDOException $e) {
      echo "Erro ao atualizar livro: " . $e->getMessage();
  }
}


  public function listar($tipo = 0, $info = ''){
    //incluir configuração do banco
    require_once('conexao.php');

    //criar conexão
    $dsn = "mysql:host=localhost;dbname=classes";
    $user = "root";
    $password = "";

    try {
      $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
      echo "Erro: " . $e->getMessage();
      exit();
    }

    $sql = 'SELECT * FROM livro';

    switch ($tipo) {
      case 1:
        $sql .= ' WHERE codigo = :info';
        break;
      case 2:
        $sql .= ' WHERE titulo = :info';
        break;
      case 3:
        $sql .= ' WHERE genero = :info';
        break;
      default:
        break;
    }

    $comando = $pdo->prepare($sql);

    if ($tipo) {
      $comando->bindValue(':info', $info);
    }

    if ($comando->execute()) {
      return $comando->fetchAll();
    }
    else {
      echo 'ERROR';
    }

    return array();
  }
}
?>