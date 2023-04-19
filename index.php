<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <h1>Biblioteca</h1>
    <a href="autor.php"><h2>Autor</h2></a>
    <a href="livro.php"><h2>Livro</h2></a>
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

 echo "<h1>Alunos<h1>";
require_once('biblioteca/aluno.class.php');
require_once('conf.inc.php');

$aluno = new Aluno(0, '', '');
$alunos = $aluno->listar();

foreach ($alunos as $a) {
  echo '<p>';
  echo $a['codigo'] . ' - ' . $a['nome'] . ' - ' . $a['matricula'] . ' ';
  echo '<a href="editar.php?codigo=' . $a['codigo'] . '">Editar|</a>';
  echo '<a href="editar.php?codigo=' . $a['codigo'] . '">Excluir|</a>';
 
  echo '</p>';
}

?>
