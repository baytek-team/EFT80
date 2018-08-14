<?php

namespace Baytek\Commerce\EFT\Rows;

use Baytek\Commerce\EFT\Validators\AlphaValidator;
use Baytek\Commerce\EFT\Validators\AlphaNumericValidator;
use Baytek\Commerce\EFT\Validators\NumericValidator;

use Baytek\Commerce\EFT\Records\RecordType;
use Baytek\Commerce\EFT\Records\OriginatorId;
use Baytek\Commerce\EFT\Records\TransactionType;
use Baytek\Commerce\EFT\Records\CPACode;
use Baytek\Commerce\EFT\Records\DueDate;
use Baytek\Commerce\EFT\Records\CustomValue;
use Baytek\Commerce\EFT\Records\InstitutionTransit;
use Baytek\Commerce\EFT\Records\AccountNumber;
use Baytek\Commerce\EFT\Records\FileCreationNumber;
use Baytek\Commerce\EFT\Records\Filler;

class Header extends Row
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
            'originatorId' => new OriginatorId(2, 10),
            'transactionType' => new TransactionType(12, 1),
            'cpa' => new CPACode(13),
            'dueDate' => new DueDate(16),
            'originatorName' => new CustomValue(22, 15),
            'institutionTransit' => new InstitutionTransit(37),
            'account' => new AccountNumber(46),
            'fileCreationNumber' => new FileCreationNumber(58),
            'filler' => new Filler(62, 19),
        ];

        $this->recordType = 'H';
        $this->filler = str_repeat(' ', 19);

        parent::__construct($properties);
    }
}