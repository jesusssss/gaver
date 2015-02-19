<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:exsl="http://exslt.org/common" xmlns:date="http://exslt.org/dates-and-times"
                extension-element-prefixes="date exsl">


    <xsl:template match="/">
        <html>
            <head>
                <title>Gaver</title>
                <meta charset="utf-8"/>

                <!-- CSS INCLUDES -->
                <link rel="stylesheet" href="/views/default/css/styles.css"/>

                <!-- JS INCLUDES -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="https://js.stripe.com/v2/"></script>
                <script>
                    Stripe.setPublishableKey('pk_test_vEU3tgxYw8aPoMHfjT6EDXgJ');   // Test key!
                </script>
                <script src="/views/default/js/buyController.js"></script>
                <script src="/views/default/js/toolbox.js"></script>

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


                    <h3>PAYMENTY:</h3>
                    <form action="/payment/create" method="POST" id="payment-form">
                        <span class="payment-errors"></span>

                        <div class="form-row">
                            <label>
                                <span>Card Number</span>
                                <input type="text" size="20" data-stripe="number"/>
                            </label>
                        </div>

                        <div class="form-row">
                            <label>
                                <span>CVC</span>
                                <input type="text" size="4" data-stripe="cvc"/>
                            </label>
                        </div>

                        <div class="form-row">
                            <label>
                                <span>Expiration (MM/YYYY)</span>
                                <input type="text" size="2" data-stripe="exp-month"/>
                            </label>
                            <span> / </span>
                            <input type="text" size="4" data-stripe="exp-year"/>
                        </div>

                        <button type="submit">Submit Payment</button>
                    </form>
                </div>
                <div class="footer">
                    Shitty footer
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>