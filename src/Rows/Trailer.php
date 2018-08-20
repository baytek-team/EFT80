<?php

namespace Baytek\Commerce\EFT\Rows;

use Baytek\Commerce\EFT\Records\RecordType;
use Baytek\Commerce\EFT\Records\TransactionCount;
use Baytek\Commerce\EFT\Records\Amount;
use Baytek\Commerce\EFT\Records\Filler;

class Trailer extends Row
{
    /**
     * EFT Header Constructor
     *
     * @return void
     */
    public function __construct(array $properties) 
    {
        $this->properties = [
            'recordType' => new RecordType('T'),
            'transactions' => new TransactionCount(2),
            'amount' => new Amount(10, 14),
            'filler' => new Filler(24, 57),
        ];

        $this->recordType = 'T';

        parent::__construct($properties);
    }
}