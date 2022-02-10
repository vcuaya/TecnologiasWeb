    <hr/>
        <?php
        echo 
            "<div>
                <h1 style=\"border-width:3;border-style:groove; background-color:#ffcc99;\">
                    Final de la p&aacute;gina PHP
                    <br>
                    V&iacute;nculos &uacute;tiles:
                    <a href=\"php.net\">php.net</a> 
                    &nbsp;
                    <a href=\"mysql.org\">mysql.org</a></h1>";
                    echo "<br>Nombre del archivo ejecutado:", $_SERVER['PHP_SELF'],"&nbsp; &nbsp; &nbsp;";
                    echo "<br>Nombre del archivo incluido:", __FILE__,"
            </div>";
        ?>
    </body>
</html>