<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Exception;

use Exception;

class MissingMessageException extends Exception
{
    public function __construct(string $message = 'Can not send a webhook with empty content (message or embed is required)', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
