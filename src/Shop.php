<?php

declare(strict_types=1);

namespace Shop;

use Shop\Factories\ItemUpdaterFactory;
use Shop\Updaters\ItemUpdater;

final class Shop
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        $itemUpdaters = ItemUpdaterFactory::makeItemUpdaters($this->items);

        /** @var ItemUpdater $itemUpdater */
        foreach ($itemUpdaters as $itemUpdater) {
            $itemUpdater->update();
        }
    }
}
