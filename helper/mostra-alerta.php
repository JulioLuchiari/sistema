<?php
//bloqueia acesso direto pela url
if (eregi("mostra-alerta.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//mostra o alerta de acordo com o tipo ('erro' ou 'sucesso')
function mostraAlerta($tipo)
{
    if(isset($_SESSION[$tipo])) : ?>
        <p class="<?php echo $tipo?>"><?php echo $_SESSION[$tipo]?></p>
    <?php
        unset($_SESSION[$tipo]);
    endif;
}