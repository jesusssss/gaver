<?php
namespace plugin;

use entities\cmsEntity;
use entities\userEntity;

class User extends \Plugin {
    public $plugin = "User";
    public $output = [];
    public $adminOutput = [];
    /** @var  userEntity $user */
    public $user;
    /** @var cmsEntity $cmsObject  */
    public $isAdmin;

    public function __construct() {
        if(isset($_SESSION["username"])) {
            $this->setUserByUsername($_SESSION["username"]);
            $this->outputUserInformation();
        } else {
            $this->guest();
        }
    }

    public function login() {
        if($this->pget("username") && $this->pget("password")) {
            $username = $this->pget("username");
            $password = $this->pget("password");
            /** @var userEntity $user */
            $user = \Bootstrap::$em->getRepository("e:userEntity")->findOneBy(array("username" => $username));
            if($user) {
                if($user->getPassword() == $password) {
                    $this->setUserByUsername($username);
                }
            }
        }
    }

    private function guest() {
        $this->addOutput(array(
            "username" => "Guest"
        )
        );
    }

    public function outputUserInformation() {
        $this->addOutput(array(
                "username" => $this->user->getUsername(),
                "password" => $this->user->getPassword(),
                "admin" => $this->user->getAdmin(),
                "email" => $this->user->getEmail()
            )
        );
    }

    public function logout() {
        unset($_SESSION["username"]);
        $this->__construct();
    }

    private function setUserByUsername($username) {
        $user = \Bootstrap::$em->getRepository("e:userEntity")->findOneBy(array("username" => $username));
        $this->user = $user;
        $_SESSION["username"] = $username;
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