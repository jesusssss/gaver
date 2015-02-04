<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use plugin\View;

class Bootstrap {
    public $em;
    public $url;
    function __construct() {
        /* Autoload composer stuff */
        require "vendor/autoload.php";
        Twig_Autoloader::register();

        $this->setConfig();

        /* Get requested url */
        $url = $_SERVER['REQUEST_URI'];
        /* If url contains $_REQUEST value, sort it out */
        if (strpos($url,'?') !== false) {
            $url = strstr($url,'?', true);
        }
        $this->url = $url;

        $admin = explode("/", $url, 3);
        /* Admin theme request */
        if($admin[1] == 'admin') {
            $theme = "admin";
        } else {
            $theme = "default";
        }

        $view = new View($theme);

        $paths = array("/entities");
        $isDevMode = false;

        // the connection configuration
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '1000koder',
            'dbname'   => 'gaver',
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

        /** Add entity namespaces here, by continuing like below */
        $config->addEntityNamespace("e", "entities");
        $config->addEntityNamespace("Cms", "plugin");


        $this->em = EntityManager::create($dbParams, $config);
    }

    public function setConfig() {
        define("__VIEWS__", "./views/");
    }
}