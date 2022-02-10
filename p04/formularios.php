<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='es' lang='es'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Pr&aacute;ctica 4: Funciones, arreglos y ciclos en PHP</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='screen' charset='utf-8' />
</head>

<body>
    <div>
        <h2>Formulario 1</h2>
        <form action="5.php" method="post">
            Edad<input type="text" name="edad">
            Sexo<input type="text" name="sexo">
            <input type="submit" value="Enviar">
        </form>
    </div>

    <div>
        <h2>Formulario 2</h2>
        <?php
        include '6.php';
        mostrar();
        ?>
        <form action="6.php" method="post">
            Matricula<input type="text" name="matricula">
            <input type="submit" value="Mostrar">
        </form>
    </div>
</body>

</html>