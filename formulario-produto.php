<?php
require_once 'config.php';
ob_start();
$titulo = "Cadastrar Produto";

require_once 'helper/validador-produto.php';

$produto = retornaDados();
?>

<div class="action-top">
	<a href="produto.php">Voltar</a>
</div>

<form action="controller/cadastra-produto.php" method="post">
	<?php require_once 'shared/formulario-produto-base.php' ?>
	<button type="submit" class="btn-submit">Cadastrar</button>
</form>
<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
