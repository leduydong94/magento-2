<?php

namespace Haru\Hello\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\View\Result\PageFactory;

class Update extends Action
{
    protected $_pageFactory;
    protected $_request;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Http $request
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
