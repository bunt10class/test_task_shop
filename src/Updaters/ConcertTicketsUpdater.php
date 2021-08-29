<?php

declare(strict_types=1);

namespace Shop\Updaters;

class ConcertTicketsUpdater extends ItemUpdater
{
    protected function changeQualityBySellIn(int $sellIn, int &$quality): void
    {
        if ($sellIn >= 10) {
            $quality += 1;
        } elseif ($sellIn >= 5) {
            $quality += 2;
        } elseif ($sellIn >= 0) {
            $quality += 3;
        } else {
            $quality = 0;
        }
    }
}