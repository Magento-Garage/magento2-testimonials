<?php
/* 
 * @package Credevlabz/Testimonials
 * @category Block
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace Credevlabz\Testimonials\Block\Adminhtml\Testimonial;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize blog testimonial edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'testimonial_id';
        $this->_blockGroup = 'Credevlabz_Testimonials';
        $this->_controller = 'adminhtml_testimonial';

        parent::_construct();

        if ($this->_isAllowedAction('Credevlabz_Testimonials::save')) {
            $this->buttonList->update('save', 'label', __('Save Testimonials'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('Credevlabz_Testimonials::testimonial_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Testimonial'));
        } else {
            $this->buttonList->remove('delete');
        }
    }

    /**
     * Retrieve text for header element depending on loaded testimonial
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('testimonial')->getId()) {
            return __("Edit testimonial by '%1'", $this->escapeHtml($this->_coreRegistry->registry('testimonial')->getName()));
        } else {
            return __('New Testimonial');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('testimonials/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}