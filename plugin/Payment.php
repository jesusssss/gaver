<?php
namespace plugin;

use Stripe\Charge;
use Stripe\Stripe;

class Payment extends \Plugin {
    public $plugin = "Payment";
    public $output = [];
    public $adminOutput = [];
    /** @var cmsEntity $cmsObject  */
    public $cmsObject;

    private $urls = array(
        "/payment/create" => "makeCharge",
    );

    public function __construct() {
        parent::__construct();



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

    public function makeCharge() {
        // Credit Card Billing
        $trialAPIKey = "sk_test_a8QrQVSmcvWo8TmuivbYW79G";  // These are the SECRET keys!
        $liveAPIKey = "sk_live_W9tfZGuheG4c4DeijTLpcWTV";

        $token = $this->pget('stripeToken');
        $email = $this->pget('email');
        $firstName = $this->pget('firstName');
        $lastName = $this->pget('lastName');
        $price = 150; //$this->pget('price');
        $priceInCents = $price * 100;   // Stripe requires the amount to be expressed in cents



        Stripe::setApiKey($trialAPIKey);
        $myCard = $token;
        $charge = Charge::create(array('card' => $myCard, 'amount' => $priceInCents, 'currency' => 'usd'));
        echo $charge;
        echo "<br/>";
        echo $charge["id"];
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