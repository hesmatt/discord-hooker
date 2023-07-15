<?php

declare(strict_types=1);

namespace HesMatt\DiscordHooker\Dto\Embed;

final class EmbedField
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var mixed
     */
    private $value = '';

    /**
     * @var boolean
     */
    private $inline = true;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function isInline(): bool
    {
        return $this->inline;
    }

    public function setInline(bool $inline): static
    {
        $this->inline = $inline;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'inline' => $this->isInline()
        ];
    }
}