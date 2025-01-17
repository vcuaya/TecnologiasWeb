<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd" />
    <xsl:template match="/">
        <html>

            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
                <link id="main-sheet" rel="stylesheet" href="http://app.saul.angry.ventures/themes/yeti/stylesheet.css" />
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
                        <div class="contenido">
                            <img src="https://i.pinimg.com/736x/7c/b2/b3/7cb2b348dc526378a823e28ee4880a8d.jpg"></img>
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
                        <xsl:value-of select="//perfil/@usuario" />
                    </li>
                    <li>
                        Correo:
                        <xsl:value-of select="/CatalogoVOD/cuenta/@correo" />
                    </li>
                    <li>
                        Idioma:
                        <xsl:value-of select="//perfil/@idioma" />
                    </li>
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
                                <xsl:for-each select="//peliculas/genero[1]/titulo">
                                    <tr>
                                        <td>
                                            <xsl:value-of select="./text()" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="./@duracion" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="//peliculas/genero[1]/@nombre" />
                                        </td>
                                    </tr>
                                </xsl:for-each>
                                <xsl:for-each select="//peliculas/genero[2]/titulo">
                                    <tr>
                                        <td>
                                            <xsl:value-of select="./text()" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="./@duracion" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="//peliculas/genero[2]/@nombre" />
                                        </td>
                                    </tr>
                                </xsl:for-each>
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
                                <xsl:for-each select="//series/genero[1]/titulo">
                                    <tr>
                                        <td>
                                            <xsl:value-of select="./text()" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="./@duracion" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="//series/genero[1]/@nombre" />
                                        </td>
                                    </tr>
                                </xsl:for-each>
                                <xsl:for-each select="//series/genero[2]/titulo">
                                    <tr>
                                        <td>
                                            <xsl:value-of select="./text()" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="./@duracion" />
                                        </td>
                                        <td>
                                            <xsl:value-of select="//series/genero[2]/@nombre" />
                                        </td>
                                    </tr>
                                </xsl:for-each>
                            </tbody>
                        </table>
                    </div>
                </div>
            </body>

        </html>
    </xsl:template>
</xsl:stylesheet>