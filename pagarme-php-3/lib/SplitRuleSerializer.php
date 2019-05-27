<?php

namespace PagarMe\Sdk;

use PagarMe\Sdk\SplitRule\SplitRuleCollection;

trait SplitRuleSerializer
{

    /**
     * @param \PagarMe\Sdk\SplitRule\SplitRuleCollection $splitRules
     * @return array
     */
    public function getSplitRulesInfo(SplitRuleCollection $splitRules)
    {
        $rules = [];

        foreach ($splitRules as $key => $splitRule) {
            $rule = [
                'recipient_id'          => $splitRule->getRecipient()->getId(),
                'charge_processing_fee' => $splitRule->getChargeProcessingFee(),
                'liable'                => $splitRule->getLiable()
            ];

            $rules[$key] = array_merge($rule, $this->getRuleValue($splitRule));
        }

        return $rules;
    }

    /**
     * @param \PagarMe\Sdk\SplitRule\SplitRule $splitRule
     * @return array
     */
    public function getRuleValue($splitRule)
    {
        if (!is_null($splitRule->getAmount())) {
            return ['amount' => $splitRule->getAmount()];
        }

        return ['percentage' => $splitRule->getPercentage()];
    }
}
