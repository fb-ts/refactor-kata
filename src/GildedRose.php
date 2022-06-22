<?php

namespace App;

use App\Item\Item;

final class GildedRose
{
    public function updateSellInAndQuality(Item $item): void
    {
        $item->updateSellInAndQuality();
    }
}
