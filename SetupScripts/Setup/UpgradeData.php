<?php
namespace BA\SetupScripts\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Cms\Model\PageFactory;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ( version_compare( $context->getVersion(), '1.0.2', '<' ) ) {
                $setup->updateTableRow(
                    $setup->getTable( 'ba_setupscripts' ),
                    'custom_id',
                    1,
                    'last_name',
                    'Tester'
                );
            }

        $setup->endSetup();
    }

}
