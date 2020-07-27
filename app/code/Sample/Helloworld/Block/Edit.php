<?php

namespace Sample\Helloworld\Block;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;
use Sample\Helloworld\Model\PostsFactory;

class Edit extends Template
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

//    public function getEditRecord()
//    {
//        $id = $this->_coreRegistry->registry('blog_id');
//        $post = $this->_postsLoader->create();
//        $result = $post->load($id);
//        $result = $result->getData();
//        return $result;
//    }
//    public function getBlogData($id)
//    {
////        $id = $this->_request->getParam('id');
////        die($id);
////        die('abc');
//        $blog = $this->_postsLoader->create();
//        $blog->load($id);
////        die($data);
//        return $blog;


//        $data = $blog->getSelect()->where('id', 1);
//        die($data);
//    }
    public function getDataById($id)
    {
        $customModel = $this->_postsLoader->create();
        $customModel->load($id);
        return $customModel;
    }
}
