<?php

namespace Baytek\Commerce\EFT\Exceptions;

use Exception;

class ValidationException extends Exception 
{
    protected $message = 'Validation Error';
}