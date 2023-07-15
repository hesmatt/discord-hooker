<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Dto\Embed;

final class EmbedFooter
{
    /**
     * @var string
     */
    private $text = '';

    /**
     * @var string
     */
    private $iconUrl = '';

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

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
}