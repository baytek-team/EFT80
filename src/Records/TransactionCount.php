<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumberValidator;

class TransactionCount extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     */
    public function __construct(int $position)
    {
        $this->position = $position;
        $this->size = 8;
        $this->validator = new NumberValidator();
    }

    /**
     * Set the value override
     *
     * @param string $value
     * 
     * @return void
     */
    public function set($value)
    {
        parent::set(str_pad($value, $this->size, '0', STR_PAD_LEFT));
    }
}