<?php

namespace PagarMe\SdkTest;

use PagarMe\Sdk\SplitRule\SplitRule;
use PagarMe\Sdk\SplitRule\SplitRuleCollection;
use PagarMe\Sdk\Recipient\Recipient;

class SplitRuleSerializerTest extends \PHPUnit_Framework_TestCase
{
    use Helper\RecipientData;
    use \PagarMe\Sdk\SplitRuleSerializer;

    /**
     * @test
     */
    public function mustSerializeSplitRule()
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

        $this->assertEquals(
            [
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
            ],
            $this->getSplitRulesInfo($splitRules)
        );
    }
}
