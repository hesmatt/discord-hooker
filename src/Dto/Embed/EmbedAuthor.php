<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Dto\Embed;

final class EmbedAuthor
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $iconUrl = '';

    /**
     * @var string
     */
    private $url = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(string $iconUrl): static
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }
}