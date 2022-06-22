<?php

namespace App;

use App\Item\AgedBrie;
use App\Item\BackstagePasses;
use App\Item\Item;
use App\Item\Legendary;
use App\Item\Standard;

class ItemFactory
{
    public static function create(string $name, int $sellIn, int $quality): Item
    {
        if ($name === 'Sulfuras, Hand of Ragnaros') {
            return new Legendary($name, $sellIn, $quality);
        }
        if ($name === 'Aged Brie') {
            return new AgedBrie($name, $sellIn, $quality);
        }
        $stringStartsWith = static function ($string, $query): bool {
            return substr($string, 0, strlen($query)) === $query;
        };
        if ($stringStartsWith($name, 'Backstage passes')) {
            return new BackstagePasses($name, $sellIn, $quality);
        }
        return new Standard($name, $sellIn, $quality);
    }
}
