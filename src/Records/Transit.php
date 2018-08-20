<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumericValidator;

class Transit extends Record
{
    /**
     * Originator ID constructor
     *
     * @param int $position
     */
    public function __construct(int $position)
    {
        $this->position = $position;
        $this->size = 5;
        $this->validator = new NumericValidator();
    }
}