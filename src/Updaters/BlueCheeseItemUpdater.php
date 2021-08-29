<?php

declare(strict_types=1);

namespace Shop\Updaters;

class BlueCheeseItemUpdater extends ItemUpdater
{
    protected function dailyQualityChange(): int
    {
        return 1;
    }

    protected function dailyExpiredQualityChange(): int
    {
        return 2;
    }
}