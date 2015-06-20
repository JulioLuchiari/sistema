<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

function mostraAlerta($tipo)
{
    if(isset($_SESSION[$tipo])) : ?>
        <p class="<?php echo $tipo?>"><?php echo $_SESSION[$tipo]?></p>
    <?php
        unset($_SESSION[$tipo]);
    endif;
}