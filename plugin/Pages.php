<?php
namespace plugin;

use entities\cmsEntity;

class Pages extends \Plugin {
    public $plugin = "Pages";
    public $output = [];
    public $adminOutput = [];
    /** @var cmsEntity $cmsObject  */

    public function __construct() {



    }

    public function getAllPages() {
        $pages = \Bootstrap::$em->getRepository("e:pageEntity")->findAll();
        $new["pages"] = [];
        foreach($pages as $key => $page) {
            foreach($page as $k => $p) {
                $new["pages"][$key][$k] = $p;
            }
        }
        $this->addOutput($new);
    }

    public function run() {
    }

    public function addOutput($output) {
        foreach($output as $key => $value) {
            $this->output[$key] = $value;
        }
    }

    public function __destruct() {
        /* Output $this->output() */
        if(!empty($this->output)) {
            \Bootstrap::addOutput(array($this->plugin, $this->output));
        }
        if(!empty($this->adminOutput)) {
            \Bootstrap::addAdminOutput(array($this->plugin, $this->adminOutput));
        }
    }

}