<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
class Bootstrap {
    public $em;
    function __construct() {
        /* Autoload composer stuff */
        require "vendor/autoload.php";

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


        $this->em = EntityManager::create($dbParams, $config);
    }
}