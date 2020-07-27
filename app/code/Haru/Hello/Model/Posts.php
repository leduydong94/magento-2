<?php

namespace Haru\Hello\Model;

use Magento\Framework\Model\AbstractModel;

class Posts extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Haru\Hello\Model\ResourceModel\Posts');
    }
}
