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
    $xsl = new DOMDocument();
    $xsl->load('catalogovod.xsl');

    $proc = new XSLTProcessor;
    $proc->importStylesheet($xsl);
    $proc->transformToUri($xml, 'serviciovod.html');
}
