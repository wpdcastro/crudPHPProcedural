<?php 
require_once __DIR__ . '/../conexaoBanco.php';

$tipos = "SELECT * FROM tipo_funcionario";
$funcionarios = $conexao->query($tipos)->fetchAll();

if (isset($_POST['nome'])) {

  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $tipoFuncionario = $_POST['tipoFuncionario'];

  $sql = "INSERT INTO funcionario (nome, email, telefone, tipo_funcionario_id)
           VALUES('$nome', '$email', '$telefone', '$tipoFuncionario')";

  if ($conexao->exec($sql)) {
      header('Location: '. 'index.php');
  } else {
    echo '<div class="alert alert-danger">';
    echo '<strong>Atenção!</strong> Cadastro não realizado';
    echo '</div>';

  
  }

}

?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<div class="container"> 
  <form method="POST" name="funcForm" >
  
    <h1>Cadastro de Funcionários</h1>
    <hr>
    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Seu nome" name="nome">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Endereço de email</label>
      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Seu email" name="email">
      <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Telefone</label>
      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Seu telefone" name="telefone">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select de exemplo</label>
      <select class="form-control" name="tipoFuncionario">
        <?php foreach ($funcionarios as $funcionario) { ?>
          <option value="<?php echo $funcionario['id']; ?>"><?php echo $funcionario['id'] . ' - ' . $funcionario['descricao']; ?></option>  
        <?php } ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

    <input type="hidden" name="id" />
    
  </form>
</div>