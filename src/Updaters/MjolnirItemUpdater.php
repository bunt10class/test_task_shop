<?php

declare(strict_types=1);

namespace Shop\Updaters;

class MjolnirItemUpdater extends ItemUpdater
{
    protected const QUALITY = 80;

    protected function updateSellIn(int $sellIn): int
    {
        return $sellIn;
    }

    protected function updateQuality(int $sellIn, int $quality): int
    {
        return self::QUALITY;
    }
}