<?php

namespace MagePsycho\DiscountLimit\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;
use MagePsycho\DiscountLimit\Logger\Logger as ModuleLogger;
use MagePsycho\DiscountLimit\Model\Config;

/**
 * @category   MagePsycho
 * @package    MagePsycho_DiscountLimit
 * @author     Raj KB <magepsycho@gmail.com>
 * @website    https://www.magepsycho.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Data extends AbstractHelper
{
    /**
     * @var ModuleLogger
     */
    protected $moduleLogger;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        Context $context,
        ModuleLogger $moduleLogger,
        Config $config,
        StoreManagerInterface $storeManager
    ) {
        $this->moduleLogger = $moduleLogger;
        $this->config = $config;
        $this->storeManager = $storeManager;

        parent::__construct($context);
    }

    public function getConfigHelper()
    {
        return $this->config;
    }

    public function getBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl(
            \Magento\Framework\UrlInterface::URL_TYPE_WEB,
            true
        );
    }

    public function isActive()
    {
        return $this->config->isEnabled();
    }

    /**
     * Logging Utility
     *
     * @param $message
     * @param bool|false $useSeparator
     * @return void
     */
    public function log($message, $useSeparator = false)
    {
        if ($this->isActive()
            && $this->config->isDebugEnabled()
        ) {
            if ($useSeparator) {
                $this->moduleLogger->customLog(str_repeat('=', 100));
            }

            $this->moduleLogger->customLog($message);
        }
    }
}
