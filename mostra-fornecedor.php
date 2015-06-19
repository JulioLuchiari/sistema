<?php
require_once 'config.php';
ob_start();
$titulo = "Mostra Fornecedor";
require_once 'DAO/fornecedorDAO.php';

if(!isset($_GET['id']))
{
	header("Location: fornecedor.php");
	die();
}

$id = $_GET['id'];
$dao = new FornecedorDAO($conn);
$fornecedor = $dao->busca($id);
?>

<div class="action-top">
	<a href="fornecedor.php">Voltar</a>
</div>

<form action="controller/remover-fornecedor.php" method="post">
	<input type="hidden" value="<?php echo $id?>" name="id">
	<button type="submit" class="btn-perigo">Remover</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>