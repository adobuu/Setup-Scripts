<?php

namespace BA\SetupScripts\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->startSetup();
        $tableName = $setup->getTable('ba_setupscripts');
        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'custom_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Custom ID'
                )->addColumn(
                    'first_name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Name'
                )->addColumn(
                'is_active',
                Table::TYPE_BOOLEAN,
                1,
                ['nullable' => false, 'default' => '1'],
                'Is Active'
            );
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
