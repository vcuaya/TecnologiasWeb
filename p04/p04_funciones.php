<?php
function multiplo($numero)
{
    if ($numero % 5 == 0)
        echo 'El n&uacute;mero ' . $numero . ' es m&uacute;ltiplo de 5<br/>';
    else
        echo 'El n&uacute;mero ' . $numero . ' no es m&uacute;ltiplo de 5<br/>';

    if ($numero % 7 == 0)
        echo 'El n&uacute;mero ' . $numero . ' es m&uacute;ltiplo de 7<br/>';
    else
        echo 'El n&uacute;mero ' . $numero . ' no es m&uacute;ltiplo de 7<br/>';
}

function random()
{
    $i = 0;
    $matriz[][]=0;
    do {
        $matriz[$i][0] = rand(100, 999);
        $matriz[$i][1] = rand(100, 999);
        $matriz[$i][2] = rand(100, 999);
        echo $matriz[$i][0] . ', ' . $matriz[$i][1] . ', ' . $matriz[$i][2] . '<br/>';
        $i++;
    } while (!($matriz[$i - 1][0] % 2 != 0 && $matriz[$i - 1][1] % 2 == 0 && $matriz[$i - 1][2] % 2 != 0));
    echo ($i * 3) . ' n&uacute;meros obtenidos en ' . $i . ' iteraciones<br/>';
}

function multiploRandom($numero)
{
    $bool = true;
    while ($bool) {
        $multiplo = rand();
        if ($multiplo % $numero == 0) {
            echo 'El n&uacute;mero ' . $multiplo . ' es m&uacute;ltiplo de ' . $numero . '<br/>';
            $bool = false;
        }
    }

    do{
        $multiplo = rand();
    }while(!($multiplo % $numero == 0));
    echo 'El n&uacute;mero ' . $multiplo . ' es m&uacute;ltiplo de ' . $numero . '<br/>';
}
