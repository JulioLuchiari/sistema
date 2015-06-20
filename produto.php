<?php
require_once 'config.php';
require_once 'helper/format_helper.php';
ob_start();
$titulo = "Gerenciar Produtos";
require_once 'DAO/produtoDAO.php';
$dao = new ProdutoDAO($conn);
$produtos = $dao->buscaTodos();
?>

<a href="index.php">Voltar para pagina principal</a>

<div class="action-top">
	<a href="formulario-produto.php">Cadastrar produto</a>
</div>

<table class="table">
	<tr>
		<th>Nome</th>
		<th>Valor Unitário</th>
		<th>Valor de Venda</th>
		<th>Quantidade em Estoque</th>
		<th>Visualizar</th>
		<th>Alterar</th>
	</tr>
	<?php 

	foreach ($produtos as $p): ?>
		<tr>
			<td><?php echo $p->getNome()?></td>
			<td><?php echo formataPreco($p->getValorUnitario())?></td>
			<td><?php echo formataPreco($p->getValorVenda())?></td>
			<td><?php echo $p->getQtdEstoque()?></td>
			<td><a href="mostra-produto.php?id=<?php echo $p->getId()?>">Visualizar</a></td>
			<td><a href="formulario-altera-produto.php?id=<?php echo $p->getId()?>">Alterar</a></td>
		</tr>	
	<?php endforeach ?>
</table>

<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>