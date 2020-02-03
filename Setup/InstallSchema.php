<?php
/* 
<<<<<<< HEAD
 * @package Credevlabz/Testimonials
=======
 * @package MagentoGarage/Testimonials
>>>>>>> Updates
 * @category Setup
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

<<<<<<< HEAD
namespace Credevlabz\Testimonials\Setup;
=======
namespace MagentoGarage\Testimonials\Setup;
>>>>>>> Updates

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install testimonials table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
<<<<<<< HEAD
            ->newTable($installer->getTable('credevlabz_testimonials'))
=======
            ->newTable($installer->getTable('magentogarage_testimonials'))
>>>>>>> Updates
            ->addColumn(
                'testimonial_id',
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Testimonial ID'
            )
            ->addColumn('name', Table::TYPE_TEXT, 150, ['nullable' => false], 'User\'s name')
            ->addColumn('email', Table::TYPE_TEXT, 150, ['nullable' => false], 'User\'s email')
            ->addColumn('content', Table::TYPE_TEXT, '2M', [], 'Testimonial Content')
            ->addColumn('is_active', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Is Active?')
            ->addColumn('creation_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'Creation Time')
            ->addColumn('update_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'Update Time')
            ->setComment('Testimonials');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

}