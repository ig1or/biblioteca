
-- tabela Aluno
CREATE TABLE `classes`.`aluno` (
  `codigo` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `matricula` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));

-- exemplo:
INSERT INTO `classes`.`aluno` (`codigo`, `nome`, `matricula`) VALUES ('2', 'emanuel', '123');


-- tabela Autor
CREATE TABLE `classes`.`autor` (
  `codigo` INT NOT NULL,
  `titulo` VARCHAR(45) NULL,
  `conteudo` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));

-- exemplo:
INSERT INTO `classes`.`autor` (`codigo`, `titulo`, `conteudo`) VALUES ('1', 'show', 'legal');

-- tabela Livro
CREATE TABLE `classes`.`livro` (
  `codigo` INT NOT NULL,
  `titulo` VARCHAR(45) NULL,
  `genero` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`));

-- exemplo:
INSERT INTO `classes`.`livro` (`codigo`, `titulo`, `genero`) VALUES ('2', 'recomeço', 'suspense');