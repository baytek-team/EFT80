<?php

namespace Baytek\Commerce\EFT\Records;


class FileCreationNumber extends Record
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
    }


    public function set($value)
    {
        parent::set(str_pad($value, $this->size, "0", STR_PAD_LEFT));
    }

}