<?php

namespace Haru\Hello\Controller\Index;

use Exception;
use Haru\Hello\Model\PostsFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Filesystem;
use Magento\Framework\View\Result\PageFactory;
use Magento\MediaStorage\Model\File\Uploader;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Save extends Action
{
    protected $_pageFactory;
    protected $_postsFactory;
    protected $_filesystem;
    protected $_request;
    protected $_uploaderFactory;
    protected $_mediaDirectory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        PostsFactory $postsFactory,
        Filesystem $filesystem,
        Http $request,
        UploaderFactory $uploaderFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory = $postsFactory;
        $this->_filesystem = $filesystem;
        $this->_mediaDirectory = $filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        $this->_request = $request;
        $this->_uploaderFactory = $uploaderFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $input = $this->getRequest()->getParams();

            $post = $this->_postsFactory->create();

            /** @var Redirect $resultRedirect */
//                $resultRedirect = $this->resultRedirectFactory->create();
            try {
                $target = $this->_mediaDirectory->getAbsolutePath('image/');
                /** @var $uploader Uploader */
                $uploader = $this->_uploaderFactory->create(['fileId' => 'image']);
                /** Allowed extension types */
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png', 'zip', 'doc']);
                /** rename file name if already exists */
                $uploader->setAllowRenameFiles(true);
                /** upload file in folder "image" */
                $extension = $uploader->getFileExtension();
//                    die($extension);
                $result = $uploader->save($target, time() . '.' . $extension);
//                    die($result['file']);
                $path = substr($target . $result['file'], 29);
//                    die($path);
                $input['image'] = $path;

            } catch (Exception $e) {
//                $this->messageManager->addError($e->getMessage());
            }
            $this->resultRedirectFactory->create()->setPath(
                '*/*/save', ['_secure' => $this->getRequest()->isSecure()]
            );

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

            return $this->_redirect('haru/index/read');
        }

    }
}
