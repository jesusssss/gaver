<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:variable name="user" select="/data/plugin[@plugin='User']/username"/>
    <xsl:variable name="admin" select="/data/plugin[@plugin='User']/admin"/>
    <xsl:variable name="js" select="'/views/admin/js/'"/>
    <xsl:variable name="css" select="'/views/admin/css/'"/>
    <xsl:variable name="img" select="'/views/admin/img/'"/>
    <xsl:variable name="url" select="/data/plugin[@plugin='config']/url"/>


</xsl:stylesheet>