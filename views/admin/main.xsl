<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:include href="setup.xsl"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Gaver</title>
                <meta charset="utf-8"/>


                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
                <!-- CSS INCLUDES -->
                <link rel="stylesheet" href="{$css}styles.css"/>

                <!-- Optional theme -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"/>
                <!-- JS INCLUDES -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                <script src="js/toolbox.js"></script>

            </head>
            <body>
                <div class="wrapper">
                    <div class="top">
                        <div id="logo">BaadeCMS</div>
                    </div>
                    <div class="content">
                        <xsl:choose>
                            <xsl:when test="$admin = 1">
                                <xsl:call-template name="admin"/>
                            </xsl:when>
                            <xsl:otherwise>
                                <xsl:call-template name="login"/>
                            </xsl:otherwise>
                        </xsl:choose>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>

    <xsl:template name="login">
        <div id="adminLoginForm">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="username" class="form-control" placeholder="Username here" name="username"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password here" name="password"/>
                </div>
                <button type="submit" class="btn btn-success" name="User-Action-login">Login</button>
            </form>
        </div>
    </xsl:template>

    <xsl:template name="admin">
        <xsl:call-template name="adminMenu"/>
        <div class="content">
            <xsl:choose>
                <xsl:when test="$url = '/admin/pages'">
                    <xsl:value-of select="/data/plugin[@plugin='Pages']/list[@type='pages']/list[2]/url"/>
                </xsl:when>
            </xsl:choose>
        </div>
        <div class="footer">
            BaadeCMS Copyright 2015
        </div>
    </xsl:template>

    <xsl:template name="adminMenu">
        <xsl:if test="$admin = 1">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Menu</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/admin/pages?Pages-Action-getAllPages">Pages <span class="sr-only">(current)</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="logout" method="post">
                            <button type="submit" name="User-Action-logout" class="btn btn-default">Logout</button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </xsl:if>
    </xsl:template>

</xsl:stylesheet>