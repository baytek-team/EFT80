<?php

namespace Baytek\Commerce\EFT\Rows;

use Baytek\Commerce\EFT\Records\RecordType;
use Baytek\Commerce\EFT\Records\DueDate;
use Baytek\Commerce\EFT\Records\CustomValue;
use Baytek\Commerce\EFT\Records\Institution;
use Baytek\Commerce\EFT\Records\Transit;
use Baytek\Commerce\EFT\Records\AccountNumber;
use Baytek\Commerce\EFT\Records\Amount;

class Detail extends Row
{
    /**
     * EFT Header Constructor
     *
     * @return void
     */
    public function __construct(array $properties) 
    {
        $this->properties = [
            'recordType' => new RecordType('H'),
            'name' => new CustomValue(2, 23),
            'dueDate' => new DueDate(25),
            'referenceNumber' => new CustomValue(31, 19),
            'institution' => new Institution(50),
            'transit' => new Transit(54),
            'account' => new AccountNumber(59),
            'amount' => new Amount(71, 10),
        ];

        $this->recordType = 'D';

        parent::__construct($properties);
    }
}