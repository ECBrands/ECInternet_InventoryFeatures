<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\InventoryFeatures\Plugin\Magento\InventorySales\Model\IsProductSalableCondition;

use Magento\InventorySales\Model\IsProductSalableCondition\IsAnySourceItemInStockCondition;
use ECInternet\InventoryFeatures\Logger\Logger;

/**
 * Plugin for Magento\InventorySales\Model\IsProductSalableCondition\IsAnySourceItemInStockCondition
 */
class IsAnySourceItemInStockConditionPlugin
{
    /**
     * @var \ECInternet\InventoryFeatures\Logger\Logger
     */
    private $logger;

    /**
     * IsAnySourceItemInStockCondition constructor.
     *
     * @param \ECInternet\InventoryFeatures\Logger\Logger $logger
     */
    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param IsAnySourceItemInStockCondition $subject
     * @param string                          $sku
     * @param int                             $stockId
     *
     * @return array
     */
    public function beforeExecute(
        IsAnySourceItemInStockCondition $subject,
        string $sku,
        int $stockId): array
    {
        $this->log('beforeExecute()', [
            'sku'     => $sku,
            'stockId' => $stockId
        ]);

        return [$sku, $stockId];
    }

    private function log(string $message, array $extra = [])
    {
        $this->logger->info('Plugin/Magento/InventorySales/Model/IsProductSalableCondition/IsAnySourceItemInStockConditionPlugin - ' . $message, $extra);
    }
}
