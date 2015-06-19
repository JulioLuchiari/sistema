<?php

function mostraAlerta($tipo)
{
    if(isset($_SESSION[$tipo])) : ?>
        <p class="<?php echo $tipo?>"><?php echo $_SESSION[$tipo]?></p>
    <?php
        unset($_SESSION[$tipo]);
    endif;
}