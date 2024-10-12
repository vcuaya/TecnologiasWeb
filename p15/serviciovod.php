<?php
libxml_use_internal_errors(true);

$xml = new DOMDocument();
$documento = file_get_contents('./catalogovod.xml');
$xml->loadXML($documento, LIBXML_NOBLANKS);

$xsd = './catalogovod.xsd';
if (!$xml->schemaValidate($xsd)) {
    $errors = libxml_get_errors();
    $noError = 1;
    $lista = '';
    foreach ($errors as $error) {
        $lista = $lista . '[' . ($noError++) . ']: ' . $error->message . ' ';
    }
    echo $lista;
} else {
    $cuentas = $xml->getElementsByTagName("cuenta");
    foreach ($cuentas as $cuenta) {
        $correo = $cuenta->getAttribute("correo");
    }

    $perfiles = $xml->getElementsByTagName("perfil");
    foreach ($perfiles as $perfil) {
        $usuario = $perfil->getAttribute("usuario");
        $idioma = $perfil->getAttribute("idioma");
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link id="main-sheet" rel="stylesheet" href="http://app.saul.angry.ventures/themes/yeti/stylesheet.css">
    <style>
        body {
            background-image: url(https://static.vecteezy.com/system/resources/previews/001/254/680/original/cinema-background-concept-vector.jpg);
        }

        div {
            border-radius: 5px;
        }

        .contenedor {
            background-color: #CCC;
            width: 100%;
            height: 100px;
            display: flex;
        }

        .contenido {
            object-fit: contain;
        }

        h1 {
            text-align: center;
        }

        h3 {
            color: azure;
        }

        ul {
            color: azure;
        }

        img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <header class="image-header">
        <div class="contenedor">
            <div class="contenido"><img src="https://i.pinimg.com/736x/7c/b2/b3/7cb2b348dc526378a823e28ee4880a8d.jpg">
            </div>
            <div class="contenido">
                <h1>
                    Bienvenido a tú catálogo!
                </h1>
            </div>
        </div>
    </header>
    <h3>
        Los datos de la cuenta son:
    </h3>
    <ul>
        <li>
            Usuario:
            <?php echo $usuario; ?></li>
        <li>
            Correo:
            <?php echo $correo; ?></li>
        <li>
            Idioma:
            <?php echo $idioma; ?></li>
    </ul>
    <div class="panel panel-primary">
        <div class="panel-heading">Películas</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Duración</th>
                        <th>Género</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $peliculas = $xml->getElementsByTagName("peliculas");
                    foreach ($peliculas as $pelicula) {
                        $generos = $pelicula->getElementsByTagName("genero");
                        foreach ($generos as $genero) {
                            $nombreGenero = $genero->getAttribute("nombre");
                            $titulos = $genero->getElementsByTagName("titulo");
                            foreach ($titulos as $titulo) {
                                echo '<tr>';
                                echo '<td>';
                                echo $nombre = $titulo->nodeValue;
                                echo '</td>';
                                echo '<td>';
                                echo $duracion = $titulo->getAttribute("duracion");
                                echo '</td>';
                                echo '<td>';
                                echo $nombreGenero;
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Series</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Duración</th>
                        <th>Género</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $series = $xml->getElementsByTagName("series");
                    foreach ($series as $serie) {
                        $generos = $serie->getElementsByTagName("genero");
                        foreach ($generos as $genero) {
                            $nombreGenero = $genero->getAttribute("nombre");
                            $titulos = $genero->getElementsByTagName("titulo");
                            foreach ($titulos as $titulo) {
                                echo '<tr>';
                                echo '<td>';
                                echo $nombre = $titulo->nodeValue;
                                echo '</td>';
                                echo '<td>';
                                echo $duracion = $titulo->getAttribute("duracion");
                                echo '</td>';
                                echo '<td>';
                                echo $nombreGenero;
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>