<?php
class Aluno {
  private $codigo;
  private $nome;
  private $matricula;

  public function __construct($codigo, $nome, $matricula) {
    $this->codigo = $codigo;
    $this->nome = $nome;
    $this->matricula = $matricula;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function setCodigo($codigo) {
    $this->codigo = $codigo;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getMatricula() {
    return $this->matricula;
  }

  public function setMatricula($matricula) {
    $this->matricula = $matricula;
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

    $sql = 'DELETE FROM aluno WHERE codigo = :codigo';
    $comando = $pdo->prepare($sql);

    $comando->bindValue(':codigo', $this->codigo);

    if ($comando->execute()) {
        echo "Aluno excluído com sucesso!";
    } else {
        echo "Erro ao excluir aluno!";
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

  $sql = 'UPDATE aluno SET nome = :nome, matricula = :matricula WHERE codigo = :codigo';
  $comando = $pdo->prepare($sql);

  $comando->bindValue(':nome', $this->nome);
  $comando->bindValue(':matricula', $this->matricula);
  $comando->bindValue(':codigo', $this->codigo);

  try {
      $comando->execute();
      echo "Aluno atualizado com sucesso!";
  } catch (PDOException $e) {
      echo "Erro ao atualizar aluno: " . $e->getMessage();
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

    $sql = 'SELECT * FROM aluno';

    switch ($tipo) {
      case 1:
        $sql .= ' WHERE codigo = :info';
        break;
      case 2:
        $sql .= ' WHERE nome = :info';
        break;
      case 3:
        $sql .= ' WHERE matricula = :info';
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