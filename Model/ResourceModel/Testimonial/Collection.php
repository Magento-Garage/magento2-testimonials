<?php
/* 
 * @package MagentoGarage/Testimonials
 * @category Model
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace MagentoGarage\Testimonials\Model\ResourceModel\Testimonial;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'testimonial_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MagentoGarage\Testimonials\Model\Testimonial', 'MagentoGarage\Testimonials\Model\ResourceModel\Testimonial');
    }

}