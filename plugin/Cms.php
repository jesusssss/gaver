<?php
namespace plugin;

use entities\cmsEntity;

class Cms extends \Bootstrap {
    public $output;
    /** @var cmsEntity $cmsObject  */
    public $cmsObject;

    private $urls = array(
        "/test/this" => array("testThisFunction","testThisToo"),
        "/test/two"  => "testThisToo"
    );

    public function __construct($pageId) {
        parent::__construct();
        $this->pageId = $pageId;
        $this->cmsObject = $this->em->getRepository("e:cmsEntity")->findOneBy(array("pageId" => $pageId));

        /* TODO Sæt ind i en form for XML/JSON sheet istedet */
        $this->output = $this->cmsObject->getContent();

        foreach($this->urls as $url => $function) {
            if($this->url == $url) {
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


    public function testThisFunction() {
        $this->output = "We got first function";
    }

    public function testThisToo() {
        $this->output = "We got the other function";
    }

    public function run() {

    }

    public function __destruct() {
        /* Output $this->output() */
        echo $this->output;
    }

}