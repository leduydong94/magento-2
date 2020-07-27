<?php
namespace Sample\Helloworld\Controller\Index;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Request\Http;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_postsFactory;
    protected $_filesystem;
    protected $_request;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Sample\Helloworld\Model\PostsFactory $postsFactory,
        \Magento\Framework\Filesystem $filesystem,
        Http $request
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory = $postsFactory;
        $this->_filesystem = $filesystem;
        $this->_request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $data = $this->getRequest()->getParams();
//        $postsFactory = $this->_postsFactory->create();
//        $postsFactory->setData($data);
//        if($postsFactory->save()){
//            $this->messageManager->addSuccessMessage(__('You saved the data.'));
//        }else{
//            $this->messageManager->addErrorMessage(__('Data was not saved.'));
//        }
//        $resultRedirect = $this->resultRedirectFactory->create();
//        $resultRedirect->setPath('hello/index/view');
//        return $resultRedirect;
        if ($this->getRequest()->isPost()) {
            $input = $this->getRequest()->getParams();
            $post = $this->_postsFactory->create();

            $id = $this->_request->getParam('id');
            if (isset($id)) {
//                die('Abc');
                $post->load($id);
                $post->addData($input);
                $post->setId($id);
                $post->save();
            } else {
                $post->setData($input)->save();
            }

            return $this->_redirect('hello/index/view');
        }

    }
}
