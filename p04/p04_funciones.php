<?php
function multiplo($numero)
{
    if ($numero % 5 == 0)
        echo 'El n&uacute;mero ' . $numero . ' es m&uacute;ltiplo de 5';
    else
        echo 'El n&uacute;mero ' . $numero . ' no es m&uacute;ltiplo de 5';
    
    if ($numero % 7 == 0)
        echo 'El n&uacute;mero ' . $numero . ' es m&uacute;ltiplo de 7';
    else
        echo 'El n&uacute;mero ' . $numero . ' no es m&uacute;ltiplo de 7';
}