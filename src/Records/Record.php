<?php

namespace Baytek\Commerce\EFT\Records;

use Baytek\Commerce\EFT\Validators\Validator;

abstract class Record
{
    /**
     * The record value
     *
     * @var mixed
     */
    protected $value;

    /**
     * Size of the record
     *
     * @var int
     */
    protected $size;

    /**
     * Position of the string in the row
     *
     * @var int
     */
    protected $position;

    /**
     * Validator class
     *
     * @var Baytek\Commerce\EFT\Validators\Validator
     */
    protected $validator;

    /**
     * To string function simply returns the value
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }

    /**
     * Set the value of the record
     *
     * @return void
     */
    public function set($value)// : void
    {
        $this->value = $value;
    }

    /**
     * Get the value of the record
     *
     * @return string
     */
    public function value(): string
    {
        return (string)$this->value;
    }

    /**
     * Get the value of the record
     *
     * @return int
     */
    public function position(): int
    {
        return $this->position;
    }

    /**
     * Has the object been touched
     *
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * Validate the value
     *
     * @return bool
     */
    public function valid(): bool 
    {
        if (method_exists($this, 'validator')) {
            return $this->validator();
        } elseif ($this->validator instanceof Validator) {
            return $this->validator->validate($this);
        } else {
            return true;
        }
    }
}