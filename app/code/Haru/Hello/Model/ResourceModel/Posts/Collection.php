<?php

namespace Haru\Hello\Model\ResourceModel\Posts;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Haru\Hello\Model\Posts',
            'Haru\Hello\Model\ResourceModel\Posts'
        );
    }
}
