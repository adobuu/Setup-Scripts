<?php

namespace BA\SetupScripts\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class Recurring implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getTable('ba_setupscripts');
        $setup->getConnection()->query("INSERT INTO " . $table . " SET first_name = 'Test', last_name = 'last'");
        $setup->endSetup();
    }
}
