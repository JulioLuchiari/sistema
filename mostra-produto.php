<?php
require_once 'config.php';
require_once 'helper/format_helper.php';
require_once 'DAO/produtoDAO.php';
require_once 'DAO/fornecedorDAO.php';
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

$fornDao = new FornecedorDAO($conn);
$fornecedor = $fornDao->busca($p->getFornId());
?>

<div class="action-top">
	<a href="produto.php">Voltar</a>
</div>

<div class="listar">
	<p><em>Produto:</em> <?php echo $p->getNome()?></p>
	<p><em>Fornecedor:</em> <a href="mostra-fornecedor.php?id=<?php echo $p->getFornId()?>"><?php echo $fornecedor->getRazaoSocial()?></a></p>
	<p><em>Tipo:</em> <?php echo $p->getTipo()?></p>
	<p><em>Valor Unitário:</em> <?php echo formataPreco($p->getValorUnitario())?></p>
	<p><em>Valor Venda:</em> <?php echo formataPreco($p->getValorVenda())?></p>
	<p><em>Valor com Desconto:</em> <?php echo formataPrecoComDesconto($p->getValorVenda(), ($p->getDesconto()))?></p>
	<p><em>Quantidade em Estoque:</em> <?php echo $p->getQtdEstoque()?></p>
	<table class="table small-table">
		<tr>
			<th>Valor de Compra</th>
			<th>Valor de Venda</th>
		</tr>
		<tr>
			<td><?php echo formataPreco($p->getValorUnitario() * $p->getQtdEstoque())?></td>
			<td><?php echo formataPreco($p->getValorVenda() * $p->getQtdEstoque())?></td>
		</tr>
	</table>
	
	<p><em>Descrição</em></p>
	<p><?php echo $p->getDescricao()?></p>
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
