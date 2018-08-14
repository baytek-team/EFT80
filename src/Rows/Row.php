<?php

namespace Baytek\Commerce\EFT\Rows;

use Exception;
use Baytek\Commerce\EFT\Exceptions\ValidationException;

abstract class Row
{
    protected $properties;

    public function __construct(array $property)
    {
        if (!is_array($property)) {
        }

        foreach ($property as $properties => $value) {
            $this->$properties = $value;
        }
    }

    /**
     * Magic setter
     * 
     * @param string $property Name of the property
     * @param string $value    Value of the property
     * 
     * @return void
     */
    public function __set(string $property, string $value)// : void
    {
        if (is_null($this->properties[$property])) {
            throw new \Exception("Property '$property' is not known");
        }

        $this->properties[$property]->set($value);
    }

    /**
     * Magic getter
     *
     * @param string $property Name of the property
     * 
     * @return void
     */
    public function __get(string $property): string
    {
        return (string)$this->properties[$property];
    }

    /**
     * To string function simply returns the export
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->export();
    }

    /**
     * Get the position of a field
     *
     * @param string $property
     * @return integer
     */
    public function positionOf($property): int
    {
        return $this->properties[$property]->position();
    }

    /**
     * To string function simply returns the export
     *
     * @return string
     */
    public function export(): string
    {
        $buffer = '';
        foreach ($this->properties as $property => $validator) {
            if (strlen($buffer) + 1 != $this->positionOf($property)) {
                throw new \Exception("The $property is not the expected length.");
            }

            if (!$validator->valid()) {
                throw new \Exception('Should not be called because it will be thrown above');
            }

            $buffer .= $this->$property;
        }

        if (strlen($buffer) !== 80) {
            throw new Exception('The row does not have exactly 80 bytes');
        }

        return $buffer;
    }
}