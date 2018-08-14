<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumericValidator;

class DueDate extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     * @param int $size
     */
    public function __construct(int $position)
    {
        $this->position = $position;
        $this->size = 6;
        $this->validator = new NumericValidator($this);
    }

}