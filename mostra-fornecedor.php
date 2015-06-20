<?php
require_once 'config.php';
require_once 'helper/format_helper.php';
require_once 'DAO/fornecedorDAO.php';
ob_start();
$titulo = "Mostra Fornecedor";
if(!isset($_GET['id']))
{
	header("Location: fornecedor.php");
	die();
}

$id = $_GET['id'];
$dao = new FornecedorDAO($conn);
//fornecedor
$f = $dao->busca($id);
?>

<div class="action-top">
	<a href="fornecedor.php">Voltar</a>
</div>

<div class="listar">
	<p>CNPJ: <?php echo formataCnpj($f->getCnpj())?></p>
	<p>Razão Social: <?php echo $f->getRazaoSocial()?></p>
	
	<p>CEP: <?php echo formataCep($f->getCep())?></p>
	<p>Endereço: <?php echo formataEndereco($f->getRua(), $f->getNumero(), $f->getBairro(), $f->getCidade(), $f->getUf())?></p>
	<p>Complemento: <?php echo $f->getComplemento()?></p>
	<p>País: <?php echo $f->getPais()?></p>
	
	<p>Telefone: <?php echo formataTelefone($f->getTelefone())?></p>
	<p>E-Mail: <?php echo $f->getEmail()?></p>
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