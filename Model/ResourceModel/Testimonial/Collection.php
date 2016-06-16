<?php
/* 
 * @package Credevlabz/Testimonials
 * @category Model
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace Credevlabz\Testimonials\Model\ResourceModel\Testimonial;

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
        $this->_init('Credevlabz\Testimonials\Model\Testimonial', 'Credevlabz\Testimonials\Model\ResourceModel\Testimonial');
    }

}