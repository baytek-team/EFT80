<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumericValidator;

class Amount extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     * @param int $size
     */
    public function __construct(int $position, int $size)
    {
        $this->position = $position;
        $this->size = $size;
        $this->validator = new NumericValidator();
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