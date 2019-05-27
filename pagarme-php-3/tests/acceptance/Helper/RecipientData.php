<?php

namespace PagarMe\Acceptance\Helper;

use PagarMe\Sdk\BankAccount\BankAccount;
use PagarMe\Sdk\Recipient\Recipient;

trait RecipientData
{
    
    public function createRecipient()
    {
        $accountData = [
            "bank_code" => "341",
            "agencia" => "0932",
            "conta" => "580" . rand(10, 99),
            "conta_dv" => "5",
            "document_number" => "26268738888",
            "legal_name" => "API BANK ACCOUNT"
        ];

        $bankAccount = new BankAccount($accountData);
        return self::getPagarMe()->recipient()->create($bankAccount);
    }
}
