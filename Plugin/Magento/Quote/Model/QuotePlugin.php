<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\InventoryFeatures\Plugin\Magento\Quote\Model;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;
use Magento\Quote\Model\Quote;
use ECInternet\InventoryFeatures\Logger\Logger;

/**
 * Plugin for Magento\Quote\Model\Quote
 */
class QuotePlugin
{
    private $logger;

    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }
    /**
     * @param Quote                                    $subject
     * @param Product|mixed                            $product
     * @param float|\Magento\Framework\DataObject|null $request
     * @param string|null                              $processMode
     *
     * @return array
     */
    public function beforeAddProduct(
        Quote $subject,
        Product $product,
        $request = null,
        $processMode = AbstractType::PROCESS_MODE_FULL): array
    {
        $this->log('beforeAddProduct()', ['product' => $product->getData()]);
        if (is_numeric($request)) {
            $this->log('beforeAddProduct()', ['request' => $product->getData()]);
        } else {
            $this->log('beforeAddProduct() - non-numeric request', ['request' => $request]);
        }

        // TODO: Implement plugin method.
        return [$product, $request, $processMode];
    }

    private function log(string $message, array $extra = [])
    {
        $this->logger->info('Plugin/Magento/QuotePlugin - ' . $message, $extra);
    }
}