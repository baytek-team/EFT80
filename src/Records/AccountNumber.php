<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumericValidator;

class AccountNumber extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     */
    public function __construct(int $position)
    {
        $this->position = $position;
        $this->size = 12;
        $this->validator = new NumericValidator();
    }

    /**
     * Get the value of the record
     *
     * @return string
     */
    public function value(): string
    {
        return str_pad($this->value, $this->size);
    }
}