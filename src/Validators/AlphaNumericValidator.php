<?php

namespace Baytek\Commerce\EFT\Validators;

use Baytek\Commerce\EFT\Exceptions\ValidationException;

class AlphaNumericValidator extends Validator
{
    /**
     * Validate the value
     * 
     * @param string $value The value we would like to validate
     * 
     * @return string
     */
    public function validate($value) 
    {
        parent::validate($value);
        
        if (!$value) {
            throw new ValidationException();
        }

        return true;
    }
}