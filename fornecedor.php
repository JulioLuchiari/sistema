<?php
ob_start();
$titulo = "Gerenciar Fornecedores";
?>

<?php 
$conteudo = ob_get_contents();
ob_end_clean();

require_once 'shared/layout.php';
?>
