<?php

namespace Baytek\Commerce\EFT\Records;


class Filler extends Record
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
        $this->value = str_repeat(' ', $this->size);
    }

}