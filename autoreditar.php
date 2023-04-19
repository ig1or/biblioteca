<!-- <?php
require_once('biblioteca/autor.class.php');
require_once('conf.inc.php');

// Verifica se o código do autor foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do autor no banco de dados
$autor = new Autor($codigo, '', '');
$dados = $autor->listar(1, $codigo);

// Verifica se o autor foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização do autor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $conteudo = $_POST['conteudo'];

  $autor->setNome($titulo);
  $autor->setMatricula($conteudo);

  if ($autor->editar($codigo, $titulo, $conteudo)) {
    header('Location: index.php');
    exit();
  } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar autor</title>
</head>
<body>
  <h1>Editar autor</h1>

  <form method="POST">
    <div>
      <label for="titulo">Nome:</label>
      <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'] ?>">
    </div>

    <div>
      <label for="conteudo">Matrícula:</label>
      <input type="text" name="conteudo" id="conteudo" value="<?php echo $dados[0]['conteudo'] ?>">
    </div>

    <input type="submit" value="Salvar">
  </form>
</body>
</html> -->

<?php
require_once('biblioteca/autor.class.php');
require_once('conf.inc.php');

// Verifica se o código do autor foi informado
if (!isset($_GET['codigo'])) {
  header('Location: index.php');
  exit();
}

$codigo = $_GET['codigo'];

// Busca os dados do autor no banco de dados
$autor = new Autor($codigo, '', '');
$dados = $autor->listar(1, $codigo);

// Verifica se o autor foi encontrado
if (empty($dados)) {
  header('Location: index.php');
  exit();
}

// Processa o formulário de atualização ou exclusão do autor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['excluir'])) {
    if ($autor->excluir()) {
      header('Location: index.php');
      exit();
    }
  } else {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];

    $autor->setNome($titulo);
    $autor->setMatricula($conteudo);

    if ($autor->editar()) {
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
  <title>Editar e Excluir autor</title>
</head>
<body>
  <h1>Editar e Excluir Autor</h1>
<a href="autor.php"><h3>Voltar</h3></a>
  <form method="POST">
    <div>
      <label for="titulo">Titulo:</label>
      <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'] ?>">
    </div>

    <div>
      <label for="conteudo">Conteudo:</label>
      <input type="text" name="conteudo" id="conteudo" value="<?php echo $dados[0]['conteudo'] ?>">
    </div>

    <input type="submit" name="salvar" value="Salvar">
    <input type="submit" name="excluir" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este autor?');">
  </form>
</body>
</html>
