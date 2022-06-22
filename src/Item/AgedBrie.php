<?php

namespace App\Item;

class AgedBrie extends Item
{

    protected function updateQuality(): void
    {
        $changeBy = $this->sellDateHasPassed() ? 2 : 1;
        $this->changeQualityBy($changeBy);
    }
}
