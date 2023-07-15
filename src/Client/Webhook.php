<?php

declare(strict_types=1);

namespace Matt\DiscordHooker\Client;

final class Webhook
{
    /**
     * @var string
     */
    private $url;

    public function __construct(
        string $url
    ) {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}