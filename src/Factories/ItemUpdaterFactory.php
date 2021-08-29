<?php

declare(strict_types=1);

namespace Shop\Factories;

use Shop\Item;
use Shop\Helpers\ItemHelper;
use Shop\Updaters\BlueCheeseItemUpdater;
use Shop\Updaters\ConcertTicketsUpdater;
use Shop\Updaters\ItemUpdater;
use Shop\Updaters\ItemUpdaterInterface;
use Shop\Updaters\MagicItemUpdater;
use Shop\Updaters\MjolnirItemUpdater;

class ItemUpdaterFactory
{
    public static function makeItemUpdaters(array $items): array
    {
        $itemProcessors = [];

        foreach ($items as $item) {
            if (!$item instanceof Item) {
                continue;
            }

            $itemProcessors[] = self::makeItemUpdater($item);
        }

        return $itemProcessors;
    }

    public static function makeItemUpdater(Item $item): ItemUpdaterInterface
    {
        switch ($item->name) {
            case ItemHelper::BLUE_CHEESE_NAME:
                return new BlueCheeseItemUpdater($item);
            case ItemHelper::MJOLNIR_NAME:
                return new MjolnirItemUpdater($item);
            case ItemHelper::CONCERT_TICKETS_NAME:
                return new ConcertTicketsUpdater($item);
            case ItemHelper::MAGIC_NAME:
                return new MagicItemUpdater($item);
        }

        return new ItemUpdater($item);
    }
}