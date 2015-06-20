<?php
require_once 'config.php';
require_once 'DAO/fornecedorDAO.php';
ob_start();
$titulo = "Alterar Fornecedor";

//verifica se o id esta sendo utilizado
if(!isset($_GET['id']))
{
	header("Location: fornecedor.php");
	die();
}

$id = $_GET['id'];
//inicializa a classe de l�gica com o banco de dados
$dao = new FornecedorDAO($conn);
//retorna o fornecedor
$fornecedor = $dao->busca($id);
?>

<div class="action-top">
	<a href="fornecedor.php">Voltar</a>
</div>

<form action="controller/altera-fornecedor.php" method="post">
	<input type="hidden" value="<?php echo $id?>" name="id">
	<?php require_once 'shared/formulario-fornecedor-base.php' ?>
	<button type="submit" class="btn-submit">Alterar</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>