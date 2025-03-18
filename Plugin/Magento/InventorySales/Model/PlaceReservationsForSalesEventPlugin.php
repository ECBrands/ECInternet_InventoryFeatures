<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\InventoryFeatures\Plugin\Magento\InventorySales\Model;

use Magento\InventorySalesApi\Api\Data\SalesChannelInterface;
use Magento\InventorySalesApi\Api\Data\SalesEventInterface;
use Magento\InventorySales\Model\PlaceReservationsForSalesEvent;
use ECInternet\InventoryFeatures\Logger\Logger;

/**
 * Plugin for Magento\InventorySales\Model\PlaceReservationsForSalesEvent
 */
class PlaceReservationsForSalesEventPlugin
{
    /**
     * @var \ECInternet\InventoryFeatures\Logger\Logger
     */
    private $logger;

    /**
     * PlaceReservationsForSalesEventPlugin constructor.
     *
     * @param \ECInternet\InventoryFeatures\Logger\Logger $logger
     */
    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    public function aroundExecute(
        PlaceReservationsForSalesEvent $subject,
        callable $proceed,
        array $items,
        SalesChannelInterface $salesChannel,
        SalesEventInterface $salesEvent
    ) {
        $this->log('aroundExecute() - Skipped adding reservations for sales event.');

        // Skip existing behavior of appending reservations
        return;
    }

    private function log(string $message, array $extra = [])
    {
        $this->logger->info('Plugin/Magento/InventorySales/Model/PlaceReservationsForSalesEventPlugin - ' . $message, $extra);
    }
}
