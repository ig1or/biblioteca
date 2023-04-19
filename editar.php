<!-- <?php
require_once('biblioteca/aluno.class.php');
require_once('conf.inc.php');

// Verifica se o código do aluno foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do aluno no banco de dados
$aluno = new Aluno($codigo, '', '');
$dados = $aluno->listar(1, $codigo);

// Verifica se o aluno foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização do aluno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $matricula = $_POST['matricula'];

  $aluno->setNome($nome);
  $aluno->setMatricula($matricula);

  if ($aluno->editar($codigo, $nome, $matricula)) {
    header('Location: index.php');
    exit();
  } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar aluno</title>
</head>
<body>
  <h1>Editar aluno</h1>

  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $dados[0]['nome'] ?>">
    </div>

    <div>
      <label for="matricula">Matrícula:</label>
      <input type="text" name="matricula" id="matricula" value="<?php echo $dados[0]['matricula'] ?>">
    </div>

    <input type="submit" value="Salvar">
  </form>
</body>
</html> -->

<?php
require_once('biblioteca/aluno.class.php');
require_once('conf.inc.php');

// Verifica se o código do aluno foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do aluno no banco de dados
$aluno = new Aluno($codigo, '', '');
$dados = $aluno->listar(1, $codigo);

// Verifica se o aluno foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização ou exclusão do aluno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['excluir'])) {
    if ($aluno->excluir()) {
      header('Location: index.php');
      exit();
    }
  } else {
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];

    $aluno->setNome($nome);
    $aluno->setMatricula($matricula);

    if ($aluno->editar()) {
      header('Location: index.php');
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar e Excluir aluno</title>
</head>
<body>
  <h1>Editar e Excluir aluno</h1>
   <a href="index.php">Voltar</a>  
  <form method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $dados[0]['nome'] ?>">
    </div>

    <div>
      <label for="matricula">Matrícula:</label>
      <input type="text" name="matricula" id="matricula" value="<?php echo $dados[0]['matricula'] ?>">
    </div>

    <input type="submit" name="salvar" value="Salvar">
    <input type="submit" name="excluir" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este aluno?');">
  </form>
</body>
</html>
