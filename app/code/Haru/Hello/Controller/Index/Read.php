<?php
namespace Haru\Hello\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Read extends Action
{
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {

        $resultPage = $this->pageFactory->create();
        // Tạo tiêu đề
        $resultPage->getConfig()->getTitle()->set(__('List Users'));

        // Tạo breadcrumb
        /** @var \Magento\Theme\Block\Html\Breadcrumbs */
        if($resultPage->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbs = $resultPage->getLayout()->getBlock('breadcrumbs');
            $breadcrumbs->addCrumb('Home',
                [
                    'label' => __('Home'),
                    'title' => __('Home'),
                    'link' => $this->_url->getUrl('')
                ]
            );
            $breadcrumbs->addCrumb('Blog',
                [
                    'label' => __('Users'),
                    'title' => __('Users')
                ]
            );
        }
        return $resultPage;
    }
}
