<?php
namespace plugin;


class View extends \Bootstrap {
    public $theme;
    private $urls = array(
        /* Multiple functions */
//        "/test/this" => array("testThisFunction","testThisToo"),
        /* One function */
//        "/test/two"  => "testThisToo"
    );

    public function __construct($theme) {
        if(!empty($theme)) {
            $this->theme = $theme;
        }
        $this->render();
    }

    public function render() {

        $loader = new \Twig_Loader_Filesystem(__VIEWS__.$this->theme);
        $twig = new \Twig_Environment($loader);

        $template = $twig->loadTemplate('main.twig');
        echo $template->render(array('the' => 'variables', 'go' => 'here'));
    }

    public function run() {
        $this->render();
    }

    public function __destruct() {
        /* Output $this->output() */
    }

}