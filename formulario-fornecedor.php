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
	<?php require_once 'shared/formulario-fornecedor-base.php' ?>
	<button type="submit" class="btn-submit">Cadastrar</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
