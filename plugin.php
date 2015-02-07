<?php
use entities\pageEntity as pageEntity;
class Plugin {

    public function __construct($url = null) {
        if($url !== null) {
            $this->getPluginFromUrl($url);
        }
        $this->runPlugins();
    }

    public function getPluginFromUrl($url) {
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

    public function __destruct() {
        $view = new plugin\View(Bootstrap::$theme, Bootstrap::$output);
    }

    public function runPlugins() {
        foreach($_REQUEST as $key => $value) {
            if(strpos($key,'-Action-')) {
                $plugin = strstr($key, "-Action", true);
                $action = strstr($key, "-Action-");
                $action = substr($action, 8);
                $class = "plugin\\$plugin";
                $run = new $class();
                $run->$action();
            }
        }
    }

    public function pget($key) {
        if(isset($_POST[$key])) {
            return $_POST[$key];
        } else if(isset($_GET[$key])) {
            return $_GET[$key];
        } else {
            return false;
        }
    }
}

