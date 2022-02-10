<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='es' lang='es'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Pr&aacute;ctica 4: Funciones, arreglos y ciclos en PHP</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='screen' charset='utf-8' />
</head>

<body>
    <div>
        <?php
        if ($_POST) {
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            if ($edad >= 18 && $edad <= 35 && $sexo == 'femenino')
                echo 'Bienvenida, usted está en el rango de edad permitido<br/>';
            else
                echo 'Lo sentimos, no cumple con los requisitos de acceso<br/>';
        }
        ?>
        <p><a href="formularios.php">Regresar</a></p>
    </div>
</body>

</html>