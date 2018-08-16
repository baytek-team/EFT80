<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\AlphaValidator;

class OriginatorId extends Record
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