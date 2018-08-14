<?php

namespace Baytek\Commerce\EFT\Validators;

use Exception;
use Baytek\Commerce\EFT\Exceptions\ValidationException;

abstract class Validator
{

    /**
     * Validate the value
     *
     * @param string $value The value we would like to validate
     * 
     * @return string
     */
    public function validate($record) 
    {
        if (!$record) {
            throw new ValidationException();
        }

        if (strlen($record->value()) != $record->size()) {
            throw new Exception('The record value is not the correct size or missing');
        }


        return true;
    }
}