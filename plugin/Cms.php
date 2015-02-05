<?php
namespace plugin;

use entities\cmsEntity;

class Cms extends \Plugin {
    public $plugin = "Cms";
    public $output = [];
    public $adminOutput = [];
    /** @var cmsEntity $cmsObject  */
    public $cmsObject;

    private $urls = array(
        "/test/this" => array("testThisFunction","testThisToo"),
        "/test/two"  => "testThisToo"
    );

    public function __construct($pageId) {
        parent::__construct();
        $this->pageId = $pageId;
        $this->cmsObject = \Bootstrap::$em->getRepository("e:cmsEntity")->findOneBy(array("pageId" => $pageId));

        $this->addOutput(array(
            "id" => $this->cmsObject->getId(),
            "pageId" => $this->cmsObject->getPageId(),
            "content" => $this->cmsObject->getContent())
        );

        foreach($this->urls as $url => $function) {
            if(\Bootstrap::$url == $url) {
                if(is_array($function)) {
                    foreach($function as $f) {
                        $this->$f();
                    }
                } else {
                    $this->$function();
                }
            }
        }
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