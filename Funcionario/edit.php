<?php 

require_once __DIR__ . '/../conexaoBanco.php';

if ($_POST["id"]) {
  
  $id = $_POST["id"];
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email']; 

  $tipoFuncionario = 1;

 

  $sql = "UPDATE funcionario 
           SET nome = '$nome',
               email = '$email',
               telefone = '$telefone',
               tipo_funcionario_id =  '$tipoFuncionario'
               WHERE id = $id";
 
}

  if ($conexao->exec($sql)) {
    header('Location: '. 'index.php');
  } else {
    echo 'Erro ao salvar';
  }