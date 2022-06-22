<?php

namespace App\Item;

abstract class Item
{
    protected const MIN_QUALITY = 0;
    protected const MAX_QUALITY = 50;

    /** @var string */
    protected $name;

    /** @var int */
    protected $sellIn;

    /** @var int */
    protected $quality;

    public function __construct(string $name, int $sellIn, int $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    final public function updateSellInAndQuality(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

    protected function updateSellIn(): void
    {
        $this->sellIn--;
    }

    abstract protected function updateQuality(): void;

    protected function sellDateIsLessThat(int $days): bool
    {
        return $this->sellIn < $days;
    }

    protected function sellDateHasPassed(): bool
    {
        return $this->sellDateIsLessThat(0);
    }

    protected function changeQualityBy(int $by): void
    {
        $quality = $this->quality + $by;
        $quality = min(static::MAX_QUALITY, $quality);
        $quality = max(static::MIN_QUALITY, $quality);
        $this->quality = $quality;
    }
}
