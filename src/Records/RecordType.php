<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\AlphaValidator;

class RecordType extends Record
{
    /**
     * Record Type constructor
     *
     * @param string $type Set the type of record
     */
    public function __construct(string $type)
    {
        $this->value = $type;
        $this->size = 1;
        $this->position = 1;
        $this->validator = new AlphaValidator();
    }

    /**
     * Ensure setting value is uppercase
     *
     * @param string $value
     * @return void
     */
    public function set($value) 
    {
        parent::set(strtoupper($value));
    }
}