<?php
use entities\pageEntity as pageEntity;
class Plugin {

    function __construct($url = null) {
        if($url !== null) {
            $this->getPluginFromUrl($url);
        }
    }

    function getPluginFromUrl($url) {
        /** @var pageEntity $page */
        $page = Bootstrap::$em->getRepository("e:pageEntity")->findOneBy(array("url" => $url));
        if($page) {
            $plugin = $page->getPlugin();
            $class  = "plugin\\$plugin";
            $run = new $class($page->getId());

            /** Every plugin must have "run" function. It will execute just before __destruct function runs */
            register_shutdown_function(array($run, 'run'));
        } else {
            header("HTTP/1.0 404 Not Found");
            echo $url."<br/>";
            echo "Page not found 404";
        }
    }

    function __destruct() {
        // Show XML instead
        if(isset($_GET["xml"])) {
            if($GLOBALS["developer"] === true) {
                //You are OK
                debug_r(Bootstrap::$output);
            } else {
                echo "You are a very rude person for trying to get here, u know?";
            }
        } else {
            $view = new plugin\View(Bootstrap::$theme, Bootstrap::$output);
        }
    }
}

