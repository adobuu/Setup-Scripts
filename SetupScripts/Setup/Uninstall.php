<?php
namespace BA\SetupScripts\Setup;

use Magento\Framework\Setup\UninstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class Uninstall implements UninstallSchemaInterface
{

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->dropTable($setup->getTable('ba_setupscripts'));
        $setup->endSetup();
    }

}
