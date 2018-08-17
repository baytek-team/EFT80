<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\NumericValidator;

use DateTime;

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
        $this->value = str_repeat(' ', $this->size);
    }

    /**
     * Validate the field
     *
     */
    public function validator()
    {
        if (strlen($this->value) !== 6) {
            return false;
        }
        
        $date = $this->value;
        $format = 'dmy';
        $d = DateTime::createFromFormat('dmy', $date);

        if ($d && $d->format($format) !== $date) {
            return false;
        }

        return true;
    }
}