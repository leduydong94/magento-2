<?php

namespace Sample\Helloworld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable('sample_hello');
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            $data = [
                [
                    'title' => 'Blog 1',
                    'summary' => 'summary blog 1',
                    'description' => 'description blog 1',
                    'status' => 1,
                    'create_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Blog 2',
                    'summary' => 'summary blog 2',
                    'description' => 'description blog 2',
                    'status' => 1,
                    'create_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Blog 3',
                    'summary' => 'summary blog 3',
                    'description' => 'description blog 3',
                    'status' => 1,
                    'create_at' => date('Y-m-d H:i:s'),
                ],
            ];
            foreach ($data as $item) {
                $setup->getConnection()->insert($tableName, $item);
            }
        }
        $setup->endSetup();
    }
}
