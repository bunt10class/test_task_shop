<?php

declare(strict_types=1);

namespace Shop\Updaters;

class MagicItemUpdater extends ItemUpdater
{
    protected function dailyQualityChange(): int
    {
        return parent::dailyQualityChange() * 2;
    }

    protected function dailyExpiredQualityChange(): int
    {
        return parent::dailyExpiredQualityChange() * 2;
    }
}