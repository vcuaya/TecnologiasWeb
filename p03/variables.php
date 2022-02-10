<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'	'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='es' lang='es'>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>Pr&aacute;ctica 3: Variables</title>
        <link rel='stylesheet' href='style.css' type='text/css' media='screen' charset='utf-8'/>
    </head>
    <body>
    <?php
    echo "================================================<br>1. Toda variable debe iniciar con el símbolo de moneda seguido de un guión bajo o una letra.<br>Se colocó un espacio para que el interprete no mostrara error por variables no definidas<br>";
    echo "$ _myvar;    // Variable válida<br>";
    echo "$ _7var;     // Variable válida<br>";
    echo "myvar;      // Variable inválida ya que omite el símbolo de moneda<br>";
    echo "$ myvar;     // Variable válida<br>";
    echo "$ var7;      // Variable válida<br>";
    echo "$ _element1; // Variable válida<br>";
    echo "$ house*5;   // Variable inválida, no se puede usar un operador binario como parte de una variable<br>";

    echo "<br>================================================<br>2. Proporcionar los valores de $ a, $ b, $ c<br>";
    $a="ManejadorSQL";
    $b='MySQL';
    $c=&$a;
    echo "$a,<br> $b,<br> $c<br>";
    unset($a);
    unset($b);
    unset($c);

    echo "En esta sección del código ahora las variables $ b y $ c hacen referencia a la variable $ a es por ello que las tres variales muestran el mismo valor<br>";
    $a="PHP server";
    $b=&$a;
    echo "$a,<br> $b,<br>";

    echo "<br>================================================<br>3.Mostrar el contenido de cada variable<br>";
    $a="PHP5";
    echo "Valor de a: " . $a . "<br>Tipo de dato ". gettype($a)."<br><br>";

    $z[]=&$a;
    echo "Valor de z: ";
    var_dump($z);
    echo "<br>Tipo de dato ". gettype($z)."<br><br>";

    $b="5a version de PHP";
    echo "Valor de b: " . $b . "<br>Tipo de dato ". gettype($b)."<br><br>";

    settype($b, "integer");
    $c=$b*10;
    echo "Valor de c: " . $c . "<br>Tipo de dato ". gettype($c)."<br><br>";

    $a.=$b;
    echo "Valor de a: " . $a . "<br>Tipo de dato ". gettype($a)."<br><br>";

    $b*=$c;
    echo "Valor de b: " . $b . "<br>Tipo de dato ". gettype($b)."<br><br>";

    $z[0]="MySQL";
    echo "Valor de z: ";
    var_dump($z);
    echo "<br>Tipo de dato ". gettype($z)."<br><br>";
    unset($a);
    unset($b);
    unset($c);
    unset($z);

    echo "<br>================================================<br>4. Uso de Globals<br>";
    $a="PHP5";
    function funcion1()
    {
        global $a;
        echo "Valor de a: " . $a . "<br>Tipo de dato ". gettype($a)."<br><br>";
    }
    funcion1();

    $z[]=&$a;
    function funcion2()
    {
        global $z;
        echo "Valor de z: ";
        var_dump($z);
        echo "<br>Tipo de dato ". gettype($z)."<br><br>";
    }
    funcion2();

    $b="5a version de PHP";
    function funcion3()
    {
        global $b;
        echo "Valor de b: " . $b . "<br>Tipo de dato ". gettype($b)."<br><br>";
    }
    funcion3();

    settype($b, "integer");
    $c=$b*10;
    function funcion4()
    {
        global $c;
        echo "Valor de c: " . $c . "<br>Tipo de dato ". gettype($c)."<br><br>";
    }
    funcion4();

    $a.=$b;
    function funcion5()
    {
        global $a;
        echo "Valor de a: " . $a . "<br>Tipo de dato ". gettype($a)."<br><br>";
    }
    funcion5();

    //settype($a, "integer");
    $b*=$c;
    function funcion6()
    {
        global $b;
        echo "Valor de b: " . $b . "<br>Tipo de dato ". gettype($b)."<br><br>";
    }
    funcion6();

    $z[0]="MySQL";
    function funcion7()
    {
        global $z;
        echo "Valor de z: ";
        var_dump($z);
        echo "<br>Tipo de dato ". gettype($z)."<br><br>";
    }
    funcion7();

    unset($a);
    unset($b);
    unset($c);
    unset($z);

    echo "<br>================================================<br>5. Mostrar el valor de las variables<br>";
    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;

    echo "Los valores son:<br>" . $a ."<br>". $b ."<br>" . $c."<br><br>";

    echo "<br>================================================<br>6. Comprobar valor booleano<br>";
    echo "Impresión con var_dump<br>";
    $a = "0";
    if(is_bool($a))
        echo "El valor de 'a' es booleano ";
    else
        echo "El valor de 'a' no es booleano ";
    var_dump($a);
    echo "<br>";

    $b = "TRUE";
    if(is_bool($b))
        echo "El valor de 'b' es booleano ";
    else
        echo "El valor de 'b' no es booleano ";
    var_dump($b);
    echo "<br>";

    $c = FALSE;
    if(is_bool($c))
        echo "El valor de 'c' es booleano ";
    else
        echo "El valor de 'c' no es booleano ";
    var_dump($c);
    echo "<br>";

    $d = ($a OR $b);
    if(is_bool($d))
        echo "El valor de 'd' es booleano ";
    else
        echo "El valor de 'd' no es booleano ";
    var_dump($d);
    echo "<br>";

    $e = ($a AND $c);
    if(is_bool($e))
        echo "El valor de 'e' es booleano ";
    else
        echo "El valor de 'e' no es booleano ";
    var_dump($e);
    echo "<br>";

    $f = ($a XOR $b);
    if(is_bool($f))
        echo "El valor de 'f' es booleano ";
    else
        echo "El valor de 'f' no es booleano ";
    var_dump($f);
    echo "<br>";

    echo "Impresión con echo<br>";
    echo "El valor de 'c' es ";
    echo var_export($c)."<br>";
    echo "El valor de 'e' es ";
    echo var_export($e)."<br>";

    echo "<br>================================================<br>7. Variable predefinida $ _SERVER<br>";
    echo "La versión de Apache y PHP es ".$_SERVER['SERVER_SOFTWARE']."<br>";
    echo "El nombre del sistema operativo es ".$_SERVER["HTTP_USER_AGENT"]."<br>";

    $idioma=substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    if($idioma == "es"){
        echo "El idioma del navegador del cliente es español";
    }
    elseif($idioma == "en"){
        echo "El idioma del navegador del cliente es inglés";
    }
    else{
        echo "El idioma del navegador del cliente es otro idioma diferente a español e inglés";
    }

    ?>
    </body>
</html>