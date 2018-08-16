<?php

namespace Baytek\Commerce\EFT\Rows;

use Exception;
use Baytek\Commerce\EFT\Exceptions\ValidationException;

abstract class Row
{
    /**
     * List of properties used on this row
     *
     * @var array
     */
    protected $properties;

    /**
     * EFT Abstract Row
     *
     * @param array $property
     */
    public function __construct(array $property)
    {
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

        if (!$this->properties[$property]->valid()) {
            throw new \Exception("$property is not valid");
        }
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
        foreach ($this->properties as $key => $property) {
            if (strlen($buffer) + 1 != $this->positionOf($key)) {
                throw new \Exception("The $key is not the expected length.");
            }

            $buffer .= $this->$key;
        }

        if (strlen($buffer) !== 80) {
            throw new Exception('The row does not have exactly 80 bytes');
        }

        return $buffer;
    }
}