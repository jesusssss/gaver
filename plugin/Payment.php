<?php
namespace plugin;

use entities\orderEntity;
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


        /** @var orderEntity $order */
        $order = new orderEntity();
        $order->setTokenId($charge["id"]);
        $order->setObject($charge["object"]);
        $order->setCreated($charge["created"]);
        $order->setLivemode($charge["liveMode"]);
        $order->setPaid($charge["paid"]);
        $order->setStatus($charge["status"]);
        $order->setAmount($charge["amount"]);
        $order->setCurency($charge["currency"]);
        $order->setRefunded($charge["refunded"]);
        $order->setSource($charge["source"]);
        $order->setCaptured($charge["captured"]);
        $order->setBalanceTransaction($charge["balance_transaction"]);
        $order->setFailureMessage($charge["failure_message"]);
        $order->setFailureCode($charge["failure_code"]);
        $order->setAmountRefunded($charge["amount_refunded"]);
        $order->setCustomer($charge["customer"]);
        $order->setInvoice($charge["invoice"]);
        $order->setDescription($charge["description"]);
        $order->setDispute($charge["dispute"]);
        $order->setMetadata($charge["metadata"]);
        $order->setStatementDescriptor($charge["statement_descriptor"]);
        $order->setFraudDetails($charge["fraud_details"]);
        $order->setReceiptEmail($charge["receipt_email"]);
        $order->setReceiptNumber($charge["receipt_number"]);
        $order->setShipping($charge["shipping"]);
        $order->setRefunds($charge["refunds"]);



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