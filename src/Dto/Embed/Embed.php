<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Dto\Embed;

use HesMatt\DiscordHooker\Dto\Embed\EmbedFooter;
use HesMatt\DiscordHooker\Dto\Embed\EmbedAuthor;
use HesMatt\DiscordHooker\Dto\Embed\EmbedField;
use HesMatt\DiscordHooker\Dto\Embed\EmbedImage;
use HesMatt\DiscordHooker\Dto\Embed\EmbedThumbnail;
use HesMatt\DiscordHooker\Manifest\EmbedManifest;
use DateTimeImmutable;

final class Embed
{
    /**
     * @var string
     */
    private $title = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $color = EmbedManifest::DEFAULT_EMBED_COLOR;

    /**
     * @var EmbedFooter
     */
    private $footer;

    /**
     * @var EmbedAuthor
     */
    private $author;

    /**
     * @var EmbedField[]
     */
    private $fields = [];

    /**
     * @var DateTimeImmutable|null
     */
    private $timestamp = null;

    /**
     * @var string
     */
    private $url = '';

    /**
     * @var EmbedImage
     */
    private $image;

    /**
     * @var EmbedThumbnail
     */
    private $thumbnail;

    public function __construct()
    {
        $this->footer = new EmbedFooter();
        $this->author = new EmbedAuthor();
        $this->image = new EmbedImage();
        $this->thumbnail = new EmbedThumbnail();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getFooter(): EmbedFooter
    {
        return $this->footer;
    }

    public function setFooter(string $text, string $iconUrl = ''): static
    {
        $this->footer = (new EmbedFooter())
            ->setText($text)
            ->setIconUrl($iconUrl);

        return $this;
    }

    public function getAuthor(): EmbedAuthor
    {
        return $this->author;
    }

    public function setAuthor(string $name, string $iconUrl = '', string $url = ''): static
    {
        $this->author = (new EmbedAuthor())
            ->setName($name)
            ->setIconUrl($iconUrl)
            ->setUrl($url);

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): static
    {
        $this->fields = $fields;

        return $this;
    }

    public function addField(string $name, mixed $value = '', bool $inline = true): static
    {
        $this->fields[] = (new EmbedField())
            ->setName($name)
            ->setValue($value)
            ->setInline($inline);

        return $this;
    }

    public function getTimestamp(): ?DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(DateTimeImmutable $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function setTimestampNow(): static
    {
        $this->timestamp = new DateTimeImmutable();

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

    public function getImage(): EmbedImage
    {
        return $this->image;
    }

    public function setImage(string $url): static
    {
        $this->image = (new EmbedImage())
            ->setUrl($url);

        return $this;
    }

    public function getThumbnail(): EmbedThumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $url): static
    {
        $this->thumbnail = (new EmbedThumbnail())
            ->setUrl($url);

        return $this;
    }

    public function toArrayForRequestBody(): array
    {
        $requiredOptions = [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'color' => $this->getColor(),
            'footer' => [
                'text' => $this->getFooter()->getText(),
                'icon_url' => $this->getFooter()->getIconUrl()
            ],
            'author' => [
                'name' => $this->getAuthor()->getName(),
                'icon_url' => '',
                'url' => ''
            ],
            'fields' => [],
            'timestamp' => '',
            'url' => $this->getUrl(),
            'image' => [
                'url' => $this->getImage()->getUrl()
            ],
            'thumbnail' => [
                'url' => $this->getThumbnail()->getUrl()
            ]
        ];

        if ($this->getTimestamp() !== null) {
            $requiredOptions['timestamp'] = $this->getTimestamp()->format('Y-m-d H:i:s.uZ');
        }

        foreach ($this->getFields() as $field) {
            $requiredOptions['fields'][] = $field->toArray();
        }

        return $requiredOptions;
    }
}