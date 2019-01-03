<?php 
require_once __DIR__ . '/../conexaoBanco.php';

if (isset($_GET['funcionarioId'])) {
  $funcionario = 'SELECT * FROM funcionario WHERE id =' . ($_GET['funcionarioId']);
  $funcionario = $conexao->query($funcionario)->fetchAll();
}

?>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<div class="container"> 
  <form method="POST" name="editForm" action="edit.php">
    <h1>Atualização de Funcionário</h1>
    <hr>
        <input type="hidden" name="id" value="<?php echo $funcionario[0][0]; ?>"/>
    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" aria-describedby="emailHelp" name="nome" value="<?php echo $funcionario[0]['nome']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Endereço de email</label>
      <input type="email" class="form-control" aria-describedby="emailHelp" name="email" value="<?php echo $funcionario[0]['email']; ?>">
      <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Telefone</label>
      <input type="text" class="form-control" name="telefone"  value="<?php echo $funcionario[0]['telefone']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select de exemplo</label>
      <select class="form-control" name="tipoFuncionario">
        <option value="0">R.H</option>
        <option value="1">Dev</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    
  </form>
</div>