<?php

namespace App\Item;

class Legendary extends Item
{
    protected const MAX_QUALITY = 80;

    protected function updateQuality(): void
    {
        $this->setMaxQuality();
    }

    protected function updateSellIn(): void
    {
    }

    private function setMaxQuality(): void
    {
        $this->quality = self::MAX_QUALITY;
    }
}
