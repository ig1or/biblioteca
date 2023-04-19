<!-- <?php
require_once('biblioteca/livro.class.php');
require_once('conf.inc.php');

// Verifica se o código do livro foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do livro no banco de dados
$livro = new Livro($codigo, '', '');
$dados = $livro->listar(1, $codigo);

// Verifica se o livro foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização do livro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $genero = $_POST['genero'];

  $livro->setNome($titulo);
  $livro->setMatricula($genero);

  if ($livro->editar($codigo, $titulo, $genero)) {
    header('Location: index.php');
    exit();
  } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar livro</title>
</head>
<body>
  <h1>Editar livro</h1>

  <form method="POST">
    <div>
      <label for="titulo">Nome:</label>
      <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'] ?>">
    </div>

    <div>
      <label for="genero">Matrícula:</label>
      <input type="text" name="genero" id="genero" value="<?php echo $dados[0]['genero'] ?>">
    </div>

    <input type="submit" value="Salvar">
  </form>
</body>
</html> -->

<?php
require_once('biblioteca/livro.class.php');
require_once('conf.inc.php');

// Verifica se o código do livro foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do livro no banco de dados
$livro = new Livro($codigo, '', '');
$dados = $livro->listar(1, $codigo);

// Verifica se o livro foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização ou exclusão do livro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['excluir'])) {
    if ($livro->excluir()) {
      header('Location: index.php');
      exit();
    }
  } else {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];

    $livro->setNome($titulo);
    $livro->setMatricula($genero);

    if ($livro->editar()) {
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
  <title>Editar e Excluir livro</title>
</head>
<body>
  <h1>Editar e Excluir Livro</h1>
<a href="livro.php"><h3>Voltar</h3></a>
  <form method="POST">
    <div>
      <label for="titulo">Titulo:</label>
      <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'] ?>">
    </div>

    <div>
      <label for="genero">Genero:</label>
      <input type="text" name="genero" id="genero" value="<?php echo $dados[0]['genero'] ?>">
    </div>

    <input type="submit" name="salvar" value="Salvar">
    <input type="submit" name="excluir" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este livro?');">
  </form>
</body>
</html>
