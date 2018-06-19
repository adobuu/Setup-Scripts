<?php

namespace BA\SetupScripts\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('ba_setupscripts');
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            $data = [
                [
                    'first_name' => 'Test',
                    'is_active' => 1
                ]
            ];

            foreach ($data as $item) {
                $setup->getConnection()->insert($tableName, $item);
            }
        }
        $setup->endSetup();
    }
}
