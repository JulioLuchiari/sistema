<?php
require_once 'config.php';
require_once 'DAO/fornecedorDAO.php';
require_once 'helper/format_helper.php';
ob_start();
$titulo = "Gerenciar Fornecedores";

//inicializa a classe de lógica com o banco de dados
$dao = new FornecedorDAO($conn);
//retorna os fornecedores
$fornecedores = $dao->buscaTodos();
?>

<a href="index.php">Voltar para pagina principal</a>

<div class="action-top">
	<a href="formulario-fornecedor.php">Cadastrar fornecedor</a>
</div>

<table class="table">
	<tr>
		<th>CNPJ</th>
		<th>Razão Social</th>
		<th>Cidade - UF</th>
		<th>Telefone</th>
		<th>Email</th>
		<th>Visualizar</th>
		<th>Alterar</th>
	</tr>
	<?php foreach ($fornecedores as $fornecedor): ?>
		<tr>
			<td><?php echo formataCnpj($fornecedor->getCnpj())?></td>
			<td><?php echo $fornecedor->getRazaoSocial()?></td>
			<td><?php echo $fornecedor->getCidade()." - ".$fornecedor->getUf()?></td>
			<td><?php echo formataTelefone($fornecedor->getTelefone())?></td>
			<td><?php echo $fornecedor->getEmail()?></td>
			<td><a href="mostra-fornecedor.php?id=<?php echo $fornecedor->getId()?>">Visualizar</a></td>
			<td><a href="formulario-altera-fornecedor.php?id=<?php echo $fornecedor->getId()?>">Alterar</a></td>
		</tr>	
	<?php endforeach;?>
</table>

<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
