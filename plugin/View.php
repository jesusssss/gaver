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

        $loader = new \Twig_Loader_Filesystem(__VIEWS__.$this->theme);
        $twig = new \Twig_Environment($loader);

        $template = $twig->loadTemplate('main.twig');
        echo $template->render(\Bootstrap::$output);
    }

    public function run() {
        $this->render();
    }

    public function __destruct() {
        /* Output $this->output() */

    }

}