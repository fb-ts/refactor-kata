<?php

namespace App\Item;

class BackstagePasses extends Item
{

    private const QUALITY_INCREASES_BY_2_WHEN_THERE_ARE_DAYS = 10;
    private const QUALITY_INCREASES_BY_3_WHEN_THERE_ARE_DAYS = 5;

    protected function updateQuality(): void
    {
        if ($this->sellDateHasPassed()) {
            $changeBy = -$this->quality;
        } elseif ($this->sellDateIsLessThat(self::QUALITY_INCREASES_BY_3_WHEN_THERE_ARE_DAYS)) {
            $changeBy = 3;
        } elseif ($this->sellDateIsLessThat(self::QUALITY_INCREASES_BY_2_WHEN_THERE_ARE_DAYS)) {
            $changeBy = 2;
        } else {
            $changeBy = 1;
        }

        $this->changeQualityBy($changeBy);
    }
}
