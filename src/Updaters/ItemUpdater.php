<?php

declare(strict_types=1);

namespace Shop\Updaters;

use Shop\Item;

class ItemUpdater implements ItemUpdaterInterface
{
    protected const MIN_NOT_EXPIRED_SELL_IN = 0;
    protected const MIN_QUALITY = 0;
    protected const MAX_QUALITY = 50;

    protected Item $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this->item->sell_in = $this->updateSellIn($this->item->sell_in);
        $this->item->quality = $this->updateQuality($this->item->sell_in, $this->item->quality);
    }

    protected function updateSellIn(int $sellIn): int
    {
        return $sellIn - 1;
    }

    protected function updateQuality(int $sellIn, int $quality): int
    {
        $this->changeQualityBySellIn($sellIn, $quality);

        if ($quality < static::MIN_QUALITY) {
            $quality = static::MIN_QUALITY;
        }
        if ($quality > static::MAX_QUALITY) {
            $quality = static::MAX_QUALITY;
        }

        return $quality;
    }

    protected function changeQualityBySellIn(int $sellIn, int &$quality): void
    {
        if ($sellIn >= static::MIN_NOT_EXPIRED_SELL_IN) {
            $quality += $this->dailyQualityChange();
        } else {
            $quality += $this->dailyExpiredQualityChange();
        }
    }

    protected function dailyQualityChange(): int
    {
        return -1;
    }

    protected function dailyExpiredQualityChange(): int
    {
        return -2;
    }
}