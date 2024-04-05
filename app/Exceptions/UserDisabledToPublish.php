<?php

namespace App\Exceptions;

use Exception;

class UserDisabledToPublish extends Exception
{
    //
    public static function fromUserId(int $user_id): static
    {
        return new static("User with id {$user_id} is disabled to publish");
    }
}
