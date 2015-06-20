<?php
require_once 'config.php';
require_once 'DAO/produtoDAO.php';
ob_start();
$titulo = "Alterar Produto";

if(!isset($_GET['id']))
{
	header("Location: produto.php");
	die();
}

$id = $_GET['id'];
$dao = new ProdutoDAO($conn);
$produto = $dao->busca($id);
?>

<div class="action-top">
	<a href="produto.php">Voltar</a>
</div>

<form action="controller/altera-produto.php" method="post">
	<input type="hidden" value="<?php echo $id?>" name="id">
	<?php require_once 'shared/formulario-produto-base.php' ?>
	<button type="submit" class="btn-submit">Alterar</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
