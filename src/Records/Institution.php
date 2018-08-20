<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumericValidator;

class InstitutionTransit extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     */
    public function __construct(int $position)
    {
        $this->position = $position;
        $this->size = 4;
        $this->validator = new NumericValidator();
    }

    /**
     * Ensure setting value is uppercase
     *
     * @param string $value
     * @return void
     */
    public function set($value) 
    {
        parent::set(str_pad($value, $this->size, '0', STR_PAD_LEFT));
    }
}