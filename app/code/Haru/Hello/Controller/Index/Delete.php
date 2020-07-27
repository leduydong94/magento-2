<?php
namespace Haru\Hello\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_request;
    protected $_postsFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Haru\Hello\Model\PostsFactory $postsFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_request = $request;
        $this->_postsFactory = $postsFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->_request->getParam('id');
        $post = $this->_postsFactory->create();
        $result = $post->setId($id);
        $result = $result->delete();
        return $this->_redirect('haru/index/read');
    }
}
