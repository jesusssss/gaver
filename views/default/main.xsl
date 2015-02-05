<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <title>Gaver</title>
                <meta charset="utf-8"/>

                <!-- CSS INCLUDES -->
                <link rel="stylesheet" href="css/styles.css"/>

                <!-- JS INCLUDES -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="js/toolbox.js"></script>

            </head>
            <body>
                <div class="top">
                    <nav>
                        <!-- TODO Output evt. en menu? Eller ikk - styr manuelt -->
                        <ul>
                            <li><a href="javascript:void(0);">Menu</a></li>
                            <li><a href="javascript:void(0);">Menu</a></li>
                            <li><a href="javascript:void(0);">Menu</a></li>
                            <li><a href="javascript:void(0);">Menu</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="content">
                    <!-- TODO Content output -->
                    <xsl:value-of select="/data/plugin[@plugin='Cms']/content"/>
                </div>
                <div class="footer">
                    Shitty footer
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>