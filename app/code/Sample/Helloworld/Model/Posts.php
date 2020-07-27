<?php

namespace Sample\Helloworld\Model;

use Magento\Framework\Model\AbstractModel;

class Posts extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Sample\Helloworld\Model\ResourceModel\Posts');
    }
}
