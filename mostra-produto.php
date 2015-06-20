<?php
require_once 'config.php';
require_once 'helper/format_helper.php';
require_once 'DAO/produtoDAO.php';
ob_start();
$titulo = "Mostra Produto";
if(!isset($_GET['id']))
{
	header("Location: produto.php");
	die();
}

$id = $_GET['id'];
$dao = new ProdutoDAO($conn);
//produto
$p = $dao->busca($id);
?>

<div class="action-top">
	<a href="produto.php">Voltar</a>
</div>

<div class="listar">
	
</div>

<form action="controller/remover-produto.php" method="post">
	<input type="hidden" value="<?php echo $id?>" name="id">
	<button type="submit" class="btn-perigo">Remover</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
