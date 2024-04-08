<?php

namespace App\Exceptions;

use Exception;

class DeleteOtherUserPostException extends Exception
{
    public function __construct()
    {
        parent::__construct('You can only delete your own posts');
    }
}
