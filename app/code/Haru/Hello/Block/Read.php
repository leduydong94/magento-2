<?php

namespace Haru\Hello\Block;

use Magento\Framework\View\Element\Template;
use Haru\Hello\Model\ResourceModel\Posts\CollectionFactory;

class Read extends Template
{
    protected $PostsFactory;

    public function __construct(Template\Context $context, CollectionFactory $postsFactory)
    {
        $this->PostsFactory = $postsFactory;
        parent::__construct($context);
    }

    public function GetBlog()
    {
        $blog = $this->PostsFactory->create();
//        $blog->setPageSize(3);
        return $blog;
    }


}
