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
    if (isset($_POST)) {
        $root = $xml->documentElement;

        $perfil = $xml->createElement("perfil");
        $perfil->setAttribute("usuario", $_POST['usuario']);
        $perfil->setAttribute("idioma", $_POST['idioma']);
        $root->childNodes->item(0)->childNodes->item(0)->appendChild($perfil);

        $genero_pelicula = $xml->createElement("genero");
        $genero_pelicula->setAttribute("nombre", $_POST['pel-genero']);

        $titulo_pelicula1 = $xml->createElement("titulo", $_POST['pel-titulo1']);
        $titulo_pelicula1->setAttribute("duracion", $_POST['pel-duracion1']);

        $titulo_pelicula2 = $xml->createElement("titulo", $_POST['pel-titulo2']);
        $titulo_pelicula2->setAttribute("duracion", $_POST['pel-duracion2']);

        $genero_pelicula->appendChild($titulo_pelicula1);
        $genero_pelicula->appendChild($titulo_pelicula2);

        $root->childNodes->item(1)->childNodes->item(0)->appendChild($genero_pelicula);

        $genero_serie = $xml->createElement("genero");
        $genero_serie->setAttribute("nombre", $_POST['ser-genero']);

        $titulo_serie1 = $xml->createElement("titulo", $_POST['ser-titulo1']);
        $titulo_serie1->setAttribute("duracion", $_POST['ser-duracion1']);

        $titulo_serie2 = $xml->createElement("titulo", $_POST['ser-titulo2']);
        $titulo_serie2->setAttribute("duracion", $_POST['ser-duracion2']);

        $genero_serie->appendChild($titulo_serie1);
        $genero_serie->appendChild($titulo_serie2);

        $root->childNodes->item(1)->childNodes->item(1)->appendChild($genero_serie);

        echo $xml->saveXML();
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="catalogovod.xml"');
    } else {
        echo '<script type="text/javascript">window.history.back(-1)</script>';
    }
}
