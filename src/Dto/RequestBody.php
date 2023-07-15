<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Dto;

use HesMatt\DiscordHooker\Dto\Embed\Embed;

final class RequestBody
{
    /**
     * @var string|null
     */
    private $avatar = null;

    /**
     * @var string|null
     */
    private $username = null;

    /**
     * @var string
     */
    private $message = '';

    /**
     * @var Embed[]
     */
    private $embeds = [];

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getEmbeds(): array
    {
        return $this->embeds;
    }

    public function setEmbeds(array $embeds): static
    {
        $this->embeds = $embeds;

        return $this;
    }

    public function addEmbed(Embed $embed): static
    {
        $this->embeds[] = $embed->toArrayForRequestBody();

        return $this;
    }
}