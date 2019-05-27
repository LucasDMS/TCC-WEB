<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\BankAccount\BankAccount;
use PagarMe\Sdk\Recipient\Recipient;
use PagarMe\Sdk\SplitRule\SplitRule;
use PagarMe\Sdk\SplitRule\SplitRuleCollection;
use PagarMe\Sdk\Transaction\CreditCardTransaction;
use PagarMe\Sdk\Transaction\Request\TransactionCapture;
use PagarMe\Sdk\RequestInterface;

class TransactionCaptureTest extends \PHPUnit_Framework_TestCase
{
    use \PagarMe\SdkTest\Helper\RecipientData;

    const PATH   = 'transactions/%s/capture';

    private $defaultMetadata = ['foo' => 'bar'];

    public function transactionIdProvider()
    {
        return [
            [555, null , []],
            [273690, 500 , ['amount'   => 500]],
            [888888, 76500 , ['amount' => 76500]]
        ];
    }

    /**
     * @dataProvider transactionIdProvider
     * @test
     */
    public function mustPayloadBeCorrectWithTransactionId(
        $transactionId,
        $amount,
        $payload
    ) {
        $transaction = $this->getAbstractTransactionMock();

        $transaction->method('getId')->willReturn($transactionId);

        $transactionCreate = new TransactionCapture($transaction, $amount);

        $this->assertEquals(
            $payload,
            $transactionCreate->getPayload()
        );

        $this->assertEquals(
            sprintf(self::PATH, $transactionId),
            $transactionCreate->getPath()
        );

        $this->assertEquals(RequestInterface::HTTP_POST, $transactionCreate->getMethod());
    }

    public function tokenProvider()
    {
        return [
            [uniqid('token'), null , []],
            [uniqid('token'), 500 , ['amount'   => 500]],
            [uniqid('token'), 76500 , ['amount' => 76500]]
        ];
    }

    /**
     * @dataProvider tokenProvider
     * @test
     */
    public function mustPayloadBeCorrectWithToken($token, $amount, $payload)
    {
        $transaction = $this->getAbstractTransactionMock();

        $transaction->method('getToken')->willReturn($token);

        $transactionCreate = new TransactionCapture($transaction, $amount);

        $this->assertEquals(
            $payload,
            $transactionCreate->getPayload()
        );

        $this->assertEquals(
            sprintf(self::PATH, $token),
            $transactionCreate->getPath()
        );

        $this->assertEquals(RequestInterface::HTTP_POST, $transactionCreate->getMethod());
    }

    /**
     * @test
     */
    public function mustUseTransactionIdInsteadOfToken()
    {
        $transactionId = 123456;
        $transaction = $this->getAbstractTransactionMock();

        $transaction->method('getToken')->willReturn('abcdef');
        $transaction->method('getId')->willReturn($transactionId);

        $transactionCreate = new TransactionCapture($transaction, null);

        $this->assertEquals(
            sprintf(self::PATH, $transactionId),
            $transactionCreate->getPath()
        );
    }

    protected function getAbstractTransactionMock()
    {
        return $this->getMockBuilder(
            'PagarMe\Sdk\Transaction\AbstractTransaction'
        )->disableOriginalConstructor()
        ->getMock();
    }

    public function transactionMetadataProvider()
    {
        return [
            [null, $this->defaultMetadata, ['metadata' => $this->defaultMetadata]],
            [500 , $this->defaultMetadata, ['amount' => 500, 'metadata' => $this->defaultMetadata]],
            [76500, $this->defaultMetadata, ['amount' => 76500, 'metadata' => $this->defaultMetadata]]
        ];
    }

    /**
     * @test
     * @dataProvider transactionMetadataProvider
     */
    public function payloadMustBeEqualWhenProvidingMetadataAtTheCaptureStep(
        $amount,
        $metadata,
        $expectedPayload
    ) {
        $transactionCreate = new TransactionCapture(
            $this->getAbstractTransactionMock(),
            $amount,
            $metadata
        );

        $this->assertEquals(
            $expectedPayload,
            $transactionCreate->getPayload()
        );
    }

    /**
     * @test
     */
    public function payloadMustBeEqualWhenProvidingSplitRulesAtTheCaptureStep()
    {
        $splitRules = new SplitRuleCollection();
        $splitRule1 = new SplitRule([
            "percentage" => 80,
            "recipient" => $this->createRecipient(),
            "liable" => true,
            "charge_processing_fee" => true,
            "charge_remainder" => true
        ]);

        $splitRule2 = new SplitRule([
            "percentage" => 20,
            "recipient" => $this->createRecipient(),
            "liable" => false,
            "charge_processing_fee" => false,
            "charge_remainder" => false
        ]);

        $splitRules[] = $splitRule1;
        $splitRules[] = $splitRule2;

        $transactionCapture = new TransactionCapture(
            $this->getAbstractTransactionMock(),
            1000,
            null,
            $splitRules
        );

        $this->assertEquals(
            [
                'amount' => 1000,
                'split_rules' => array(
                    array(
                        "recipient_id" => null,
                        "charge_processing_fee" => true,
                        "liable" => true,
                        "percentage" => 80
                    ),
                    array(
                        "recipient_id" => null,
                        "charge_processing_fee" => false,
                        "liable" => false,
                        "percentage" => 20
                    )
                )
            ],
            $transactionCapture->getPayload()
        );
    }
}
