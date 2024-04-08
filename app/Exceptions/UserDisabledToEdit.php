<?php

namespace App\Exceptions;

use Exception;

class UserDisabledToEdit extends Exception
{
    public function __construct()
    {
        parent::__construct('User not have authorization to edit this publication');
    }
}
