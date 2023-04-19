<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor</title>
</head>
<body>
<p><a href="index.php">Voltar</a> - Voltar para a Biblioteca</p>
</body>
</html>
<?php
    //listagem
// require_once('biblioteca\aluno.class.php');
// require_once 'conf.inc.php';

//listagem
// $aluno = new Aluno(0, '', '');
// $alunos = $aluno->listar();
// foreach ($alunos as $a) {
//   echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['matricula'] . '<br>';
// }

    // listagem, editar e excluir
// require_once('biblioteca/aluno.class.php');
// require_once('conf.inc.php');

// $aluno = new Aluno(0, '', '');
// $alunos = $aluno->listar();

// foreach ($alunos as $a) {
//   echo '<p>';
//   echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['matricula'] . ' ';
//   echo '<a href="editar.php?codigo=' . $a['codigo'] . '">Editar</a>';
//   echo '<a href="editar.php?codigo=' . $a['codigo'] . '">Excluir</a>';
//   echo '</p>';
// }
echo "<h1>Autores<h1>";
require_once('biblioteca/autor.class.php');
require_once('conf.inc.php');

$autor = new Autor(0, '', '');
$autores = $autor->listar();

foreach ($autores as $a) {
  echo '<p>';
  echo $a['codigo'] . ' - ' . $a['titulo'] . ' - ' . $a['conteudo'] . ' ';
  echo '<a href="autoreditar.php?codigo=' . $a['codigo'] . '">Editar|</a>';
  echo '<a href="autoreditar.php?codigo=' . $a['codigo'] . '">Excluir|</a>';
 
  echo '</p>';
}

?>
