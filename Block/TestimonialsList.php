<?php
/* 
 * @package MagentoGarage/Testimonials
 * @category Block
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace MagentoGarage\Testimonials\Block;

use MagentoGarage\Testimonials\Api\Data\TestimonialInterface;
use MagentoGarage\Testimonials\Model\ResourceModel\Testimonial\Collection as TestimonialCollection;

class TestimonialsList extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * @var \MagentoGarage\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory
     */
    protected $_testimonialCollectionFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \MagentoGarage\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory $testimonialCollectionFactory,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \MagentoGarage\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory $testimonialCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_testimonialCollectionFactory = $testimonialCollectionFactory;
    }

    /**
     * @return \MagentoGarage\Testimonials\Model\ResourceModel\Testimonial\Collection
     */
    public function getTestimonials()
    {
        if (!$this->hasData('testimonials')) {
            $testimonials = $this->_testimonialCollectionFactory
                ->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    TestimonialInterface::CREATION_TIME,
                    TestimonialCollection::SORT_ORDER_DESC
                );
            $this->setData('testimonials', $testimonials);
        }
        return $this->getData('testimonials');
    }
    
    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getTestimonials()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'testimonials.list.pager'
            )->setCollection(
                $this->getTestimonials()
            );
            $this->setChild('pager', $pager);
            $this->getTestimonials()->load();
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    
    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\MagentoGarage\Testimonials\Model\Testimonial::CACHE_TAG . '_' . 'list'];
    }

}