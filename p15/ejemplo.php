<?php
$xmlstr = <<<XML
<?xml version='1.0' encoding="ISO-8859-1"?>
<universidades>
   <universidad tipo="publica">
      <nombre>Universidad Politecnica de Valencia</nombre>
      <especialidades>
         <especialidad>Ing. Informatica</especialidad>
         <especialidad>Ing. Telecomuncaciones</especialidad>     
         <especialidad>Ing. Indrustrial</especialidad>
      </especialidades>
   </universidad>
   <universidad tipo="privada">
      <nombre>Universidad CEU</nombre>
      <especialidades>
         <especialidad>Magisterio</especialidad>
         <especialidad>ADE</especialidad>
         <especialidad>Medicina</especialidad>
      </especialidades>
   </universidad>
</universidades>
XML;

try {
    //cargamos el contenido XML
    $xml = new SimpleXMLElement($xmlstr);
    /*usaremos la función simplexml_load_file('ejemplo.xml'); 
en el caso que el contenido venga de un fichero y no de memoria*/
} catch (Exception $e) {
    //manejamos error de lectura
    echo 'XML no valido';
}

$xml->universidad[0]->localizacion->ciudad = 'Madrid';
$xml->universidad[0]->nombre = 'Universidad Politecnica de Madrid';

$v_Universidades = array();

//contador de las universidades disponibles
$contUni = 0;

//bucle univerdidades
foreach ($xml->universidad as $univerdidadInfo) {
    //contador de las especialidades
    $contEspe = 0;

    //bucle especialidades
    foreach ($univerdidadInfo->especialidades->especialidad as $especialidadInfo) {
        $v_Universidades[$contUni][$contEspe] .= $especialidadInfo;
        $contEspe++;
    }
    $contUni++;
}

var_dump($v_Universidades);