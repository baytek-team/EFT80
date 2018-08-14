<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\AlphaValidator;

class TransactionType extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     */
    public function __construct(int $position)
    {
        $this->position = $position;
        $this->size = 1;
        $this->validator = new AlphaValidator($this->size);
    }
}