<?php
namespace entities;
use \Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Order")
 */
class orderEntity {

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    public $id;

    /** @ORM\Column(type="string") */
    public $token_id;

    /** @ORM\Column(type="string") */
    public $object;

    /** @ORM\Column(type="integer") */
    public $livemode;

    /** @ORM\Column(type="integer") */
    public $paid;

    /** @ORM\Column(type="string") */
    public $status;

    /** @ORM\Column(type="decimal") */
    public $amount;

    /** @ORM\Column(type="string") */
    public $curency;

    /** @ORM\Column(type="integer") */
    public $refunded;

    /** @ORM\Column(type="string") */
    public $source;

    /** @ORM\Column(type="integer") */
    public $captured;

    /** @ORM\Column(type="integer") */
    public $balance_transaction;

    /** @ORM\Column(type="string") */
    public $failure_message;

    /** @ORM\Column(type="decimal") */
    public $amount_refunded;

    /** @ORM\Column(type="string") */
    public $invoice;

    /** @ORM\Column(type="string") */
    public $description;

    /** @ORM\Column(type="string") */
    public $dispute;

    /** @ORM\Column(type="string") */
    public $metadata;

    /** @ORM\Column(type="string") */
    public $statement_descriptor;

    /** @ORM\Column(type="string") */
    public $fraud_details;

    /** @ORM\Column(type="string") */
    public $receipt_email;

    /** @ORM\Column(type="string") */
    public $receipt_number;

    /** @ORM\Column(type="string") */
    public $shipping;

    /** @ORM\Column(type="string") */
    public $refunds;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmountRefunded()
    {
        return $this->amount_refunded;
    }

    /**
     * @param mixed $amount_refunded
     */
    public function setAmountRefunded($amount_refunded)
    {
        $this->amount_refunded = $amount_refunded;
    }

    /**
     * @return mixed
     */
    public function getBalanceTransaction()
    {
        return $this->balance_transaction;
    }

    /**
     * @param mixed $balance_transaction
     */
    public function setBalanceTransaction($balance_transaction)
    {
        $this->balance_transaction = $balance_transaction;
    }

    /**
     * @return mixed
     */
    public function getCaptured()
    {
        return $this->captured;
    }

    /**
     * @param mixed $captured
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;
    }

    /**
     * @return mixed
     */
    public function getCurency()
    {
        return $this->curency;
    }

    /**
     * @param mixed $curency
     */
    public function setCurency($curency)
    {
        $this->curency = $curency;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDispute()
    {
        return $this->dispute;
    }

    /**
     * @param mixed $dispute
     */
    public function setDispute($dispute)
    {
        $this->dispute = $dispute;
    }

    /**
     * @return mixed
     */
    public function getFailureMessage()
    {
        return $this->failure_message;
    }

    /**
     * @param mixed $failure_message
     */
    public function setFailureMessage($failure_message)
    {
        $this->failure_message = $failure_message;
    }

    /**
     * @return mixed
     */
    public function getFraudDetails()
    {
        return $this->fraud_details;
    }

    /**
     * @param mixed $fraud_details
     */
    public function setFraudDetails($fraud_details)
    {
        $this->fraud_details = $fraud_details;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return mixed
     */
    public function getLivemode()
    {
        return $this->livemode;
    }

    /**
     * @param mixed $livemode
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param mixed $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @param mixed $paid
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * @return mixed
     */
    public function getReceiptEmail()
    {
        return $this->receipt_email;
    }

    /**
     * @param mixed $receipt_email
     */
    public function setReceiptEmail($receipt_email)
    {
        $this->receipt_email = $receipt_email;
    }

    /**
     * @return mixed
     */
    public function getReceiptNumber()
    {
        return $this->receipt_number;
    }

    /**
     * @param mixed $receipt_number
     */
    public function setReceiptNumber($receipt_number)
    {
        $this->receipt_number = $receipt_number;
    }

    /**
     * @return mixed
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param mixed $refunded
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;
    }

    /**
     * @return mixed
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * @param mixed $refunds
     */
    public function setRefunds($refunds)
    {
        $this->refunds = $refunds;
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param mixed $shipping
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getStatementDescriptor()
    {
        return $this->statement_descriptor;
    }

    /**
     * @param mixed $statement_descriptor
     */
    public function setStatementDescriptor($statement_descriptor)
    {
        $this->statement_descriptor = $statement_descriptor;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTokenId()
    {
        return $this->token_id;
    }

    /**
     * @param mixed $token_id
     */
    public function setTokenId($token_id)
    {
        $this->token_id = $token_id;
    }




}