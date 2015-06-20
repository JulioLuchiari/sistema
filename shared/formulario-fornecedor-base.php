<?php 
//evita acesso direto a url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}
?>
<fieldset>
	<legend>Dados da empresa</legend>
	
	<label for="cnpj">CNPJ:</label>
	<input type="text" id="cnpj" name="cnpj" required value="<?php echo $fornecedor->getCnpj()?>">
	
	<label for="razao-social">Razão Social:</label>
	<input type="text" id="razao-social" name="razao-social" required value="<?php echo $fornecedor->getRazaoSocial()?>">
</fieldset>

<fieldset>
	<legend>Endereço</legend>
	
	<label for="cep">CEP:</label>
	<input type="text" id="cep" name="cep" required value="<?php echo $fornecedor->getCep()?>"><br>
	
	<label for="rua">Rua:</label>
	<input type="text" id="rua" name="rua" required value="<?php echo $fornecedor->getRua()?>">
	
	<label for="numero">Número:</label>
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