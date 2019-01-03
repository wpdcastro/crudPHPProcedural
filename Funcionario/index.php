<?php 
require_once __DIR__ . '/../conexaoBanco.php';

echo '<div class="container">';
echo "<h2>Funcionários</h2><hr>";

$sql = 'SELECT * FROM funcionario AS f INNER JOIN tipo_funcionario AS tf ON tf.id = f.tipo_funcionario_id';

$funcionarios = $conexao->query($sql)->fetchAll();

echo "<table class=table id='tabelaFuncionarios'>";
echo '<thead class="thead-dark"><tr>';
echo '<th>ID</td>';
echo '<th>NOME</td></th>';
echo '<th>TELEFONE</th>';
echo '<th>EMAIL</th>';
echo '<th>TIPO</th>';
echo '<th>AÇÕES</th>';
echo '</tr></thead>';
echo '<tbody>';
foreach ($funcionarios as $funcionario) {
  echo '<tr>'; 
  echo '<th scope="row">' . $funcionario[0]. '</th>';
  echo '<td>' . $funcionario['nome'] . '</td>';
  echo '<td>' . $funcionario['telefone'] . '</td>';
  echo '<td>' . $funcionario['email'] . '</td>';
  echo '<td>' . $funcionario['descricao'] . '</td>';
  echo '<td>';
  echo '<button class="btn btn-warning" onclick="editar('. $funcionario[0] .')">Editar</button>';
  echo '<button class="btn btn-danger" onclick="apagar('. $funcionario[0] .')">Excluir</button>';
  echo '</td>';
  echo '</thead>';
  echo '</tr>';
}
echo '</tb>';
echo '</div>';
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <input name="filt" type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Busca por Nome" onKeyUp="busca(this, '0')"></td>
    </div>

    <button type="button" class="btn btn-success" id="txtBusca" onclick="addNovoFuncionario()">Novo Funcionário</button>
    <br><br>
  </body>

  <script>
  
    function addNovoFuncionario() {
      window.location.href = "/crudTeste/Funcionario/criarFuncionario.php";
    }

    function apagar(id) {
      if (confirm("Deseja realmente apagar Funcionario?")) {
        window.location.href = '/crudTeste/Funcionario/apagarFuncionario.php?funcionarioId=' + id;
      }
    }

    function editar(id) {
      window.location.href = '/crudTeste/Funcionario/editarFuncionario.php?funcionarioId=' + id;
    }

    function busca (phrase, cellNr) {
      var palavra = phrase.value.toLowerCase();  
      var tabela = document.getElementById("tabelaFuncionarios");  
      var ele;

      for (var r = 1; r < tabela.rows.length; r++) {     
          ele = tabela.rows[r].cells[1].innerHTML.replace(/<[^>]+>/g,"");     
    
          if (ele.toLowerCase().indexOf(palavra) >= 0 )    
              tabela.rows[r].style.display = '';      
          else 
              tabela.rows[r].style.display = 'none';  
      }

    }  
  
  </script>