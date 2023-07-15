<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Client;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use HesMatt\DiscordHooker\Dto\Embed\Embed;
use HesMatt\DiscordHooker\Dto\RequestBody;
use HesMatt\DiscordHooker\Exception\MissingMessageException;

final class Webhook
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var RequestBody
     */
    private $requestBody;

    public function __construct(
        string $url
    ) {
        $this->url = $url;

        $this->client = new Client();
        $this->requestBody = new RequestBody();
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUsername(string $username): static
    {
        $this->requestBody->setUsername($username);

        return $this;
    }

    public function setAvatar(string $avatarUrl): static
    {
        $this->requestBody->setAvatar($avatarUrl);

        return $this;
    }

    public function setMessage(string $message): static
    {
        $this->requestBody->setMessage($message);

        return $this;
    }

    public function addEmbed(Embed $embed): static
    {
        $this->requestBody->addEmbed($embed);

        return $this;
    }

    public function send(): void
    {
        $this->client->post($this->url, [
            RequestOptions::JSON => $this->buildPayload()
        ]);
    }

    private function buildPayload(): array
    {
        if ($this->requestBody->getMessage() === null) {
            throw new MissingMessageException();
        }

        return [
            'username' => $this->requestBody->getUsername(),
            'avatar_url' => $this->requestBody->getAvatar(),
            'content' => $this->requestBody->getMessage(),
            'embeds' => $this->requestBody->getEmbeds(),
        ];
    }
}