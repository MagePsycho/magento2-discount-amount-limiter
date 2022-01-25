<?php

namespace MagePsycho\DiscountLimit\Plugin\Model\SalesRule\Rule\Action;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\SalesRule\Model\Rule\Action\Discount\ByPercent;
use MagePsycho\DiscountLimit\Helper\Data as DiscountLimitHelper;

/**
 * @category   MagePsycho
 * @package    MagePsycho_DiscountLimit
 * @author     Raj KB <magepsycho@gmail.com>
 * @website    https://www.magepsycho.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SetMaxDiscountPlugin
{
    /**
     * @var array
     */
    public static $maxDiscount = [];

    /**
     * @var array
     */
    private $processedRule = [];

    /**
     * @var DiscountLimitHelper
     */
    private $discountLimitHelper;

    /**
     * @var PriceCurrencyInterface
     */
    private $priceCurrency;

    public function __construct(
        DiscountLimitHelper $discountLimitHelper,
        PriceCurrencyInterface $priceCurrency
    ) {
        $this->discountLimitHelper = $discountLimitHelper;
        $this->priceCurrency = $priceCurrency;
    }

    public function aroundCalculate(
        ByPercent $subject,
        callable $proceed,
        $rule,
        $item,
        $qty
    ) {
        $discountData = $proceed($rule, $item, $qty);
        if (! $this->discountLimitHelper->isActive()) {
            return $discountData;
        }

        $store = $item->getQuote()->getStore();
        $itemId = $item->getId();
        $cachedKey = $itemId . '_' . $discountData->getBaseAmount();
        if (! strlen($rule->getMaxDiscountAmount()) || $rule->getMaxDiscountAmount() < 0.0001) {
            return $discountData;
        }

        if (! isset(self::$maxDiscount[$rule->getId()]) || isset($this->processedRule[$rule->getId()][$cachedKey])) {
            self::$maxDiscount[$rule->getId()] = $rule->getMaxDiscountAmount();
            $this->processedRule[$rule->getId()] = null;
        }

        if (self::$maxDiscount[$rule->getId()] - $discountData->getBaseAmount() < 0) {
            $convertedPrice = $this->priceCurrency->convert(self::$maxDiscount[$rule->getId()], $store);
            $discountData->setBaseAmount(self::$maxDiscount[$rule->getId()]);
            $discountData->setAmount($this->priceCurrency->round($convertedPrice));
            $discountData->setBaseOriginalAmount(self::$maxDiscount[$rule->getId()]);
            $discountData->setOriginalAmount($this->priceCurrency->round($convertedPrice));
            self::$maxDiscount[$rule->getId()] = 0;
        } else {
            self::$maxDiscount[$rule->getId()] =
                self::$maxDiscount[$rule->getId()] - $discountData->getBaseAmount();
        }

        $this->processedRule[$rule->getId()][$cachedKey] = true;

        return $discountData;
    }
}
