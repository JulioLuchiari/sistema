<?php
require_once 'config.php';
ob_start();
$titulo = "Cadastrar Fornecedor";

require_once 'helper/validador-fornecedor.php';

$fornecedor = retornaDados();
?>

<div class="action-top">
	<a href="fornecedor.php">Voltar</a>
</div>

<form action="controller/cadastra-fornecedor.php" method="post">
	<fieldset>
		<legend>Dados da empresa</legend>
		
		<label for="cnpj">CNPJ:</label>
		<input type="text" id="cnpj" name="cnpj" required value="<?php echo $fornecedor->getCnpj()?>">
		
		<label for="razao-social">Razao Social:</label>
		<input type="text" id="razao-social" name="razao-social" required value="<?php echo $fornecedor->getRazaoSocial()?>">
	</fieldset>
	
	<fieldset>
		<legend>Endereço</legend>
		
		<label for="cep">CEP:</label>
		<input type="text" id="cep" name="cep" required value="<?php echo $fornecedor->getCep()?>"><br>
		
		<label for="rua">Rua:</label>
		<input type="text" id="rua" name="rua" required value="<?php echo $fornecedor->getRua()?>">
		
		<label for="numero">Numero:</label>
		<input type="number" id="numero" name="numero" min="0" class="input-small" required value="<?php echo $fornecedor->getNumero()?>">
		
		<label for="complemento">Complemento:</label>
		<input type="text" id="complemento" name="complemento" required value="<?php echo $fornecedor->getComplemento()?>"><br>
		
		<label for="bairro">Bairro:</label>
		<input type="text" id="bairro" name="bairro" required value="<?php echo $fornecedor->getBairro()?>">
		
		<label for="cidade">Cidade:</label>
		<input type="text" id="cidade" name="cidade" required value="<?php echo $fornecedor->getCidade()?>">
		
		<label for="uf">UF:</label>
		<input type="text" id="uf" name="uf" class="input-small" required value="<?php echo $fornecedor->getUf()?>">
		
		<label for="pais">País:</label>
		<input type="text" id="pais" name="pais" required value="<?php echo $fornecedor->getPais()?>">		
	</fieldset>
	
	<fieldset>
		<legend>Dados de contato</legend>
		
		<label for="email">E-Mail:</label>
		<input type="email" name="email" id="email" required value="<?php echo $fornecedor->getEmail()?>">
		
		<label for="telefone">Telefone:</label>
		<input type="tel" name="telefone" id="telefone" required value="<?php echo $fornecedor->getTelefone()?>">
	</fieldset>

	<button type="submit" class="btn-submit">Cadastrar</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
