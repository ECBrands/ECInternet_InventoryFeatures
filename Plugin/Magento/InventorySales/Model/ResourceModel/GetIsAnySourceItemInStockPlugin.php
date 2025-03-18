<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\InventoryFeatures\Plugin\Magento\InventorySales\Model\ResourceModel;

use Magento\InventorySales\Model\ResourceModel\GetIsAnySourceItemInStock;
use ECInternet\InventoryFeatures\Logger\Logger;

/**
 * Plugin for Magento\InventorySales\Model\ResourceModel\GetIsAnySourceItemInStock
 */
class GetIsAnySourceItemInStockPlugin
{
    /**
     * @var \ECInternet\InventoryFeatures\Logger\Logger
     */
    private $logger;

    /**
     * GetIsAnySourceItemInStockPlugin constructor.
     *
     * @param \ECInternet\InventoryFeatures\Logger\Logger $logger
     */
    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param GetIsAnySourceItemInStock $subject
     * @param callable                  $proceed
     * @param string                    $sku
     * @param int                       $stockId
     *
     * @return bool
     */
    public function aroundExecute(
        GetIsAnySourceItemInStock $subject,
        callable $proceed,
        string $sku,
        int $stockId): bool
    {
        $this->log('aroundExecute()', ['sku' => $sku, 'stockId' => $stockId]);

        $result = $proceed($sku, $stockId);
        $this->log('aroundExecute()', ['sku' => $sku, 'stockId' => $stockId, 'result' => $result]);

        return $result;
    }

    private function log(string $message, array $extra = [])
    {
        $this->logger->info('Plugin/Magento/InventorySales/Model/ResourceModel/GetIsAnySourceItemInStockPlugin - ' . $message, $extra);
    }
}
