<?php 

require_once __DIR__ . '/../conexaoBanco.php';

$id = $_GET['funcionarioId'];
$sql = "DELETE FROM funcionario WHERE id = $id";

if ($conexao->query($sql)) {
	header('Location: '. 'index.php');
} else {
	echo 'Erro ao apagar';
}