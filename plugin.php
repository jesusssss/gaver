<?php
use entities\pageEntity as pageEntity;
class Plugin extends Bootstrap {

    function __construct($url = null) {
        parent::__construct();
        if($url !== null) {
            $this->getPluginFromUrl($url);
        }
    }

    function getPluginFromUrl($url) {
        /** @var pageEntity $page */
        $page = $this->em->getRepository("e:pageEntity")->findOneBy(array("url" => $url));
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
}

