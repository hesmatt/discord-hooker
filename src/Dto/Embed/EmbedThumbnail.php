<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Dto\Embed;

final class EmbedThumbnail
{
    /**
     * @var string
     */
    private $url = '';

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