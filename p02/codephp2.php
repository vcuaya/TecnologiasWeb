<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>

<?php
$variable1 = "PHP 5";
$variable2 = "MySQL";
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php
    echo "<title>Una p&aacute;gina llena de scripts PHP</title>";
    ?>
</head>

<body>
    <script language="php">
        echo "<H1>BUENOS D&Iacute;AS A TODOS</H1>";
    </script>
    <?php
    echo "<h2>T&iacute;tulo escrito por PHP</h2>";
    ?>
    <p>Vas a descubrir
        <?php
        echo $variable1
        ?>
    </p>
    <?php
    echo "<h2>Buenos d&iacute;as de $variable1</h2>";
    ?>
    <p>Utilizaci&oacute;n de variables PHP<br />Vas a descubrir igualmente
        <?php
        echo $variable2;
        ?>
    </p>
    <?= "<div><big>Buenos d&iacute;as de $variable2</big></div>" ?>
</body>

</html>