<?php

namespace BA\SetupScripts\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {

        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('ba_setupscripts'),
                'last_name',
                [
                    'type' => Table::TYPE_TEXT,
                    'unsigned' => true,
                    'nullable' => true,
                    'comment' => 'Last Name'
                ]
            );
        }

        $setup->endSetup();
    }
}
