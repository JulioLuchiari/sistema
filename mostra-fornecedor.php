<?php
require_once 'config.php';
require_once 'helper/format_helper.php';
require_once 'DAO/fornecedorDAO.php';
ob_start();
$titulo = "Mostra Fornecedor";

//verifica se o id esta sendo utilizado
if(!isset($_GET['id']))
{
	header("Location: fornecedor.php");
	die();
}

$id = $_GET['id'];
//inicializa a classe de lógica com o banco de dados
$dao = new FornecedorDAO($conn);
//retorna o fornecedor
$f = $dao->busca($id);
?>

<div class="action-top">
	<a href="fornecedor.php">Voltar</a>
</div>

<div class="listar">
	<p><em>CNPJ:</em> <?php echo formataCnpj($f->getCnpj())?></p>
	<p><em>Razão Social:</em> <?php echo $f->getRazaoSocial()?></p>
	
	<p><em>CEP:</em> <?php echo formataCep($f->getCep())?></p>
	<p><em>Endereço:</em> <?php echo formataEndereco($f->getRua(), $f->getNumero(), $f->getBairro(), $f->getCidade(), $f->getUf())?></p>
	<p><em>Complemento:</em> <?php echo $f->getComplemento()?></p>
	<p><em>País:</em> <?php echo $f->getPais()?></p>
	
	<p><em>Telefone:</em> <?php echo formataTelefone($f->getTelefone())?></p>
	<p><em>E-Mail:</em> <?php echo $f->getEmail()?></p>
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