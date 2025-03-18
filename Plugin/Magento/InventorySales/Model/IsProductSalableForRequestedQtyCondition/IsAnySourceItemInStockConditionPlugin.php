<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\InventoryFeatures\Plugin\Magento\InventorySales\Model\IsProductSalableForRequestedQtyCondition;

use Magento\InventorySales\Model\IsProductSalableForRequestedQtyCondition\IsAnySourceItemInStockCondition;
use ECInternet\InventoryFeatures\Logger\Logger;

/**
 * Plugin for Magento\InventorySales\Model\IsProductSalableForRequestedQtyCondition\IsAnySourceItemInStockCondition
 */
class IsAnySourceItemInStockConditionPlugin
{
    /**
     * @var \ECInternet\InventoryFeatures\Logger\Logger
     */
    private $logger;

    /**
     * IsAnySourceItemInStockConditionPlugin constructor.
     *
     * @param \ECInternet\InventoryFeatures\Logger\Logger $logger
     */
    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param \Magento\InventorySales\Model\IsProductSalableForRequestedQtyCondition\IsAnySourceItemInStockCondition $subject
     * @param string                                                                                                 $sku
     * @param int                                                                                                    $stockId
     * @param float                                                                                                  $requestedQty
     *
     * @return array
     */
    public function beforeExecute(
        IsAnySourceItemInStockCondition $subject,
        string $sku,
        int $stockId,
        float $requestedQty): array
    {
        $this->log('beforeExecute()', [
            'sku'          => $sku,
            'stockId'      => $stockId,
            'requestedQty' => $requestedQty
        ]);

        return [$sku, $stockId, $requestedQty];
    }

    private function log(string $message, array $extra = [])
    {
        $this->logger->info('Plugin/Magento/InventorySales/Model/IsProductSalableForRequestedQtyCondition/IsAnySourceItemInStockConditionPlugin - ' . $message, $extra);
    }
}