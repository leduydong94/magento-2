<?php

namespace Haru\Hello\Block;

use Haru\Hello\Model\PostsFactory;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;

class Update extends Template
{
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_postsLoader;
    protected $_request;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Registry $coreRegistry,
        PostsFactory $postsLoader,
        Http $request,
        array $data = []
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_postsLoader = $postsLoader;
        $this->_request = $request;
        return parent::__construct($context, $data);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    public function getId()
    {
        $id = $this->_request->getParam('id');
        return $id;
    }

    public function getDataById($id)
    {
        $customModel = $this->_postsLoader->create();
        $customModel->load($id);
        return $customModel;
    }
}
