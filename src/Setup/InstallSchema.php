<?php

namespace MagePsycho\DiscountLimit\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @category   MagePsycho
 * @package    MagePsycho_DiscountLimit
 * @author     Raj KB <magepsycho@gmail.com>
 * @website    https://www.magepsycho.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->addColumn(
            $installer->getTable('salesrule'),
            'max_discount_amount',
            [
                'type'      => Table::TYPE_DECIMAL,
                'length'    => '12,4',
                'nullable'  => false,
                'default'   => '0.0000',
                'comment'   => 'Max Discount Amount'
            ]
        );

        $installer->endSetup();
    }
}
