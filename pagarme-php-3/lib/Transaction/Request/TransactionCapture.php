<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\RequestInterface;
use PagarMe\Sdk\SplitRule\SplitRuleCollection;

class TransactionCapture implements RequestInterface
{
    use \PagarMe\Sdk\SplitRuleSerializer;

    /**
     * @var int
     */
    protected $transaction;
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var array
     */
    protected $metadata;
    /**
     * @var PagarMe\Sdk\SplitRule\SplitRuleCollection
     */
    protected $splitRules;

    /**
     * @param PagarMe\Sdk\Transaction\Transaction $transaction
     * @param int $amount
     * @param array $metadata
     * @param PagarMe\Sdk\SplitRule\SplitRuleCollection $splitRules
     */
    public function __construct($transaction, $amount, $metadata = [], SplitRuleCollection $splitRules = null)
    {
        $this->transaction = $transaction;
        $this->amount = $amount;
        $this->metadata = $metadata;
        $this->splitRules = $splitRules;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        $payload = [];

        if (!is_null($this->amount)) {
            $payload['amount'] = $this->amount;
        }

        if (!empty($this->metadata)) {
            $payload['metadata'] = $this->metadata;
        }

        if (!is_null($this->splitRules)) {
            $payload['split_rules'] = $this->getSplitRulesInfo(
                $this->splitRules
            );
        }

        return $payload;
    }

    /**
     * @return mixed
     */
    protected function getTransactionId()
    {
        $transactionId = $this->transaction->getId();

        if ($transactionId) {
            return $transactionId;
        }

        return $this->transaction->getToken();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return sprintf('transactions/%s/capture', $this->getTransactionId());
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_POST;
    }
}
