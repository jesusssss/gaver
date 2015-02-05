<?php
namespace plugin;


class View {
    public $theme;
    public $data;
    private $urls = array(
        /* Multiple functions */
//        "/test/this" => array("testThisFunction","testThisToo"),
        /* One function */
//        "/test/two"  => "testThisToo"
    );

    public function __construct($theme, $data) {
        if(!empty($theme)) {
            $this->theme = $theme;
            $this->data = $data;
            $this->render();
        } else {
            debug("No theme to render [View]");
        }
    }

    public function render() {
        $xmlData = new \SimpleXMLElement('<data/>');

        foreach(\Bootstrap::$output as $key => $node) {
            $this->data = $xmlData->addChild('plugin');
            $this->data->addAttribute("plugin", $key);

            foreach($node as $k => $v) {
                if(is_array($v)) {
                    $list = $this->data->addChild("list");
                    $list->addAttribute("type", $k);
                    $this->addListItems($v, $list);

                } else {
                    $this->data->addChild($k, $v);
                }
            }
        }

        if(\Bootstrap::$theme == "admin") {
            foreach(\Bootstrap::$adminOutput as $key => $node) {
                $this->data = $xmlData->addChild('plugin');
                $this->data->addAttribute("plugin", $key);

                foreach($node as $k => $v) {
                    if(is_array($v)) {
                        $list = $this->data->addChild("list");
                        $list->addAttribute("type", $k);
                        $this->addListItems($v, $list);

                    } else {
                        $this->data->addChild($k, $v);
                    }
                }
            }
        }

        // Load the XML source
        $xml = new \DOMDocument;
        $xml->loadXML($xmlData->asXML());

        $xsl = new \DOMDocument;
        $xsl->load(__VIEWS__.$this->theme."/main.xsl");

        if(isset($_GET["xml"])) {
            if ($GLOBALS["developer"] === true) {
                header('Content-type: text/xml');
                print($xmlData->asXML());
            } else {
                echo "You are a very rude person for trying to get here, u know?";
            }
        } else {
            // Configure the transformer
            $proc = new \XSLTProcessor;
            $proc->importStyleSheet($xsl); // attach the xsl rules
            echo $proc->transformToXML($xml);
        }

    }

    public function addListItems($dataArray, $list) {
        foreach($dataArray as $key => $value) {
            if(is_array($value)) {
                $newList = $list->addChild("list");
                $newList->addAttribute("type", $key);
                $this->addListItems($value, $newList);
            } else {
                $list->addChild($key, $value);
            }
        }
    }

    public function run() {
        $this->render();
    }

    public function __destruct() {
        /* Output $this->output() */

    }

}