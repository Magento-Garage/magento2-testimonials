<?php
/* 
 * @package MagentoGarage/Testimonials
 * @category Controller
 * @author Aman Srivastava <http://amansrivastava.in>
 *
 */

namespace MagentoGarage\Testimonials\Controller\Index;

use \Magento\Framework\App\Action\Action;

class Index extends Action
{
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Testimonials Index, shows a list of recent Testimonials.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultFactory = $this->resultPageFactory->create();
        return $resultFactory;
    }
    public function add()
    {
        // 1. POST request : Get booking data
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
            // Retrieve your form data
            $name   = $post['name'];
            $email    = $post['email'];
            $content = $post['content'];

            // Doing-something with...

            // Display the succes form validation message
            $this->messageManager->addSuccessMessage(' Testimonials Added !');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/Testimonials/index/add');

            return $resultRedirect;
        }
        // 2. GET request : Render the booking page 
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}