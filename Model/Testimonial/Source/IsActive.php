<?php
/* 
 * @package Credevlabz/Testimonials
 * @category Model
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace Credevlabz\Testimonials\Model\Testimonial\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Credevlabz\Testimonials\Model\Testimonial
     */
    protected $testimonial;

    /**
     * Constructor
     *
     * @param \Credevlabz\Testimonials\Model\Testimonial $testimonial
     */
    public function __construct(\Credevlabz\Testimonials\Model\Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->testimonial->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}