<?php 
//evita acesso direto a url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}
require_once 'DAO/fornecedorDAO.php';
//inicializa a classe de lógica com a tabela fornecedores
$fornDao = new FornecedorDAO($conn);
//retorna todos os fornecedores a serem utilizados no campo select
$fornecedores = $fornDao->buscaTodos();
?>
<fieldset>
	<legend>Fornecedor</legend>
	<select name="fornecedor">
		<?php foreach ($fornecedores as $fornecedor):?>
			<?php if ($fornecedor->getId() == $produto->getFornId()): ?>
				<option value="<?php echo $fornecedor->getId()?>" selected="selected"><?php echo $fornecedor->getRazaoSocial()?></option>
			<?php else: ?>
				<option value="<?php echo $fornecedor->getId()?>"><?php echo $fornecedor->getRazaoSocial()?></option>
			<?php endif ?>
		<?php endforeach ?>
	</select>
</fieldset>

<fieldset>
	<legend>Produto</legend>
	
	<label for="nome">Nome: </label>
	<input type="text" name="nome" id="nome" required value="<?php echo $produto->getNome()?>">
	
	<label for="preco">Preço: </label>
	<input type="number" min="0" step="0.01" name="preco" id="preco" required class="input-small" value="<?php echo $produto->getValorUnitario()?>">
	
	<label for="preco">Desconto: </label>
	<input type="number" min="0" max="12" name="desconto" id="desconto" required class="input-small" value="<?php echo $produto->getDesconto()?>"> 
	
	<label for="estoque">Qtd estoque: </label>
	<input type="number" min="0" name="estoque" id="estoque" required class="input-small" value="<?php echo $produto->getQtdEstoque()?>">
</fieldset>

<fieldset>
	<legend>Tipo</legend>
	<label>
		Perecível: <input type="radio" value="perecivel" name="tipo" checked>
	</label>
	<label>
		Não Perecível: <input type="radio" value="nao perecivel" name="tipo">
	</label>
</fieldset>

<fieldset>
	<legend>Descrição</legend>
	<textarea name="descricao" required><?php echo $produto->getDescricao()?></textarea>
</fieldset>