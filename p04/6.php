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
        $parqueVehicular = array(
            'NBE4683' => array(
                'Auto' => array('Marca' => 'KIA', 'Modelo' => 'PICANTO', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Juan Valdez', 'Ciudad' => 'Puebla', 'Direccion' => 'Av. 11 Sur 753')
            ),
            'FPE5447' => array(
                'Auto' => array('Marca' => 'HONDA', 'Modelo' => 'ACCORD', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Antonio Castro', 'Ciudad' => 'Guadalajara', 'Direccion' => 'Hidalgo 400')
            ),
            'PFW5757' => array(
                'Auto' => array('Marca' => 'MERCEDES BENZ', 'Modelo' => 'S430', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Valeria Grajales', 'Ciudad' => 'Monterrey', 'Direccion' => 'Sierra Gorda 456')
            ),
            'WHM2594' => array(
                'Auto' => array('Marca' => 'MERCEDES BENZ', 'Modelo' => 'S500', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Araceli Mendoza', 'Ciudad' => 'Tijuana', 'Direccion' => 'Tulipanes 23')
            ),
            'BJM7395' => array(
                'Auto' => array('Marca' => 'CHEVEROLET', 'Modelo' => 'AVEO', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Hector Gonzalez', 'Ciudad' => 'Tepic', 'Direccion' => 'Allende 159')
            ),
            'CVY3648' => array(
                'Auto' => array('Marca' => 'SKODA', 'Modelo' => 'OCTAVIA', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Alejandra Castillo', 'Ciudad' => 'Oaxaca', 'Direccion' => 'Olivos 852')
            ),
            'UJX7256' => array(
                'Auto' => array('Marca' => 'RSM', 'Modelo' => 'SM3', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Brenda Ramos', 'Ciudad' => 'Saltillo', 'Direccion' => 'Barranquilla 789')
            ),
            'WXU2428' => array(
                'Auto' => array('Marca' => 'TOYOTA', 'Modelo' => 'CAMRY', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Edgar Jimenez', 'Ciudad' => 'Guanajuato', 'Direccion' => 'Mirasoles 357')
            ),
            'JWS9752' => array(
                'Auto' => array('Marca' => 'GMC', 'Modelo' => 'SAVANA', 'Tipo' => 'PICKUP'),
                'Propietario' => array('Nombre' => 'Carolina Hurtado', 'Ciudad' => 'Puebla', 'Direccion' => 'Reforma 651')
            ),
            'YBV4924' => array(
                'Auto' => array('Marca' => 'DODGE', 'Modelo' => 'GRAND CARAVAN', 'Tipo' => 'AUTOBUS'),
                'Propietario' => array('Nombre' => 'Erick Cadena', 'Ciudad' => 'Jalapa', 'Direccion' => 'Rio Bravo 7852')
            ),
            'RTU6478' => array(
                'Auto' => array('Marca' => 'FIAT', 'Modelo' => 'MOBI', 'Tipo' => 'HATCHBACK'),
                'Propietario' => array('Nombre' => "Nicolas Tapia", 'Ciudad' => 'Aguascalientes', 'Direccion' => 'San Francisco 15')
            ),
            'XCT3397' => array(
                'Auto' => array('Marca' => 'VOLKSWAGEN', 'Modelo' => 'GOLF R', 'Tipo' => 'HATCHBACK'),
                'Propietario' => array('Nombre' => 'Lucia Carmona', 'Ciudad' => 'Piedras Negras', 'Direccion' => 'Arroyo 1596')
            ),
            'EQV9384' => array(
                'Auto' => array('Marca' => 'NISSAN', 'Modelo' => 'ALTIMA', 'Tipo' => 'SEDAN'),
                'Propietario' => array('Nombre' => 'Sofia Esparza', 'Ciudad' => 'Atlixco', 'Direccion' => 'Los Pilares 5')
            ),
            'NZB5828' => array(
                'Auto' => array('Marca' => 'FORD', 'Modelo' => 'BRONCO', 'Tipo' => 'VAN'),
                'Propietario' => array('Nombre' => 'Carlos Contreras', 'Ciudad' => 'Ciudad Valles', 'Direccion' => 'Naranjo 89')
            ),
            'FPL2863' => array(
                'Auto' => array('Marca' => 'JAC', 'Modelo' => 'SUNRAY', 'Tipo' => 'VAN'),
                'Propietario' => array('Nombre' => 'Maria Sanchez', 'Ciudad' => 'Ciudad de Mexico', 'Direccion' => 'Reforma 6549')
            )
        );

        function mostrar()
        {
            global $parqueVehicular;
            print_r($parqueVehicular);
            echo '<br/>';
            echo '<br/>';
        }

        if ($_POST) {
            $matricula = $_POST['matricula'];
            foreach ($parqueVehicular as $indice => $valor) {
                if ($indice == $matricula) {
                    echo 'Los datos registrados para la matr&iacute;cula ' . $matricula . ' son:' . '<br/>';
                    print_r($valor);
                }
            }
            echo '<p><a href="formularios.php">Regresar</a></p>';
        }
        ?>
    </div>
</body>

</html>