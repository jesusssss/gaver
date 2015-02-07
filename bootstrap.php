<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use entities\baadeCmsEntity;
use plugin\View;

class Bootstrap
{
    public static $em;
    public static $url;
    public static $adminOutput = [];
    public static $output = [];
    public static $theme;
    public static $dbname;

    protected static $instance = null;

    function __construct()
    {
        /* Autoload composer stuff */
        require "vendor/autoload.php";



        /* Get requested url */
        $url = $_SERVER['REQUEST_URI'];
        /* If url contains $_REQUEST value, sort it out */
        if (strpos($url, '?') !== false) {
            $url = strstr($url, '?', true);
        }
        self::$url = $url;

        $admin = explode("/", $url, 3);
        /* Admin theme request */
        if ($admin[1] == 'admin') {
            self::$theme = "admin";
        } else {
            self::$theme = "default";
        }

        $paths = array("/entities");
        $isDevMode = false;

        $dbName = $this->getDbName();

        // the connection configuration
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '1000koder',
            'dbname' => $dbName,
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

        /** Add entity namespaces here, by continuing like below */
        $config->addEntityNamespace("e", "entities");
        $config->addEntityNamespace("Cms", "plugin");


        self::$em = EntityManager::create($dbParams, $config);

        $this->setConfig();

    }


    public function setConfig()
    {
        define("__VIEWS__", __DIR__."/views/");
        $config = array(
            "config", array(
                "url" => self::$url,
                "isDeveloper" => $GLOBALS["developer"],
                "theme" => self::$theme
            )
        );
        $this->addOutput($config);
    }

    public function getDbName() {
        $completeUrl = $_SERVER["HTTP_HOST"];
        $paths = array("/entities");
        $isDevMode = false;
        // the connection configuration
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '1000koder',
            'dbname' => 'baadecms',
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

        /** Add entity namespaces here, by continuing like below */
        $config->addEntityNamespace("e", "entities");

        $em = EntityManager::create($dbParams, $config);
        /** @var baadeCmsEntity $db */
        $db = $em->getRepository("e:baadeCmsEntity")->findOneBy(array("url" => $completeUrl));
        return $db->getName();
    }

    public static function addOutput($output) {
        self::$output[$output[0]] = $output[1];
    }

    public static function addAdminOutput($output) {
        self::$adminOutput[$output[0]] = $output[1];
    }
}