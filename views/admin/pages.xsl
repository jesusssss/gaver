<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template name="listPages">
        <a href="/admin/pages/new">
            <button class="btn btn-default">
                New page
            </button>
        </a>
        <h2>List of pages</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Link
                    </th>
                    <th>
                        Plugin
                    </th>
                    <th align="center">
                        Edit
                    </th>
                    <th align="center">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                <xsl:for-each select="/data/plugin[@plugin='Pages']/list[@type='pages']/list">
                    <tr>
                        <td>
                            <xsl:value-of select="title"/>
                        </td>
                        <td>
                            <xsl:value-of select="url"/>
                        </td>
                        <td>
                            <xsl:value-of select="plugin"/>
                        </td>
                        <td align="center">
                            <a href="/admin/pages/edit/{id}">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td align="center">
                            <a href="/admin/pages/delete/{id}" onclick="return confirm('Are you sure?');">
                                <span style="color: red;" class="glyphicon glyphicon-minus-sign"></span>
                            </a>
                        </td>
                    </tr>
                </xsl:for-each>
            </tbody>
        </table>
    </xsl:template>

    <xsl:template name="newPage">
        <h2>
            New page
        </h2>
        <form class="form" method="post">
            <input type="text" class="form-control" name="title" placeholder="Page title"/>
            <input type="text" class="form-control" name="link" placeholder="Page link (autogenerated)"/>
            <select class="form-control">
                <option>
                    Vælg plugin
                </option>
            </select>
        </form>
    </xsl:template>

</xsl:stylesheet>