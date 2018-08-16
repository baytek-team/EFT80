<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\AlphaNumericValidator;

class CustomValue extends Record
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
        $this->validator = new AlphaNumericValidator();
    }

    /**
     * Get the value of the record
     *
     * @return string
     */
    public function value(): string
    {
        return substr(str_pad($this->value, $this->size), 0, $this->size);
    }
}