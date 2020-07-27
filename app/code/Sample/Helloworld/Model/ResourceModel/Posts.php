<?php

namespace Sample\Helloworld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Posts extends AbstractDb
{
    protected function _construct()
    {
        // sample_hello là tên bảng , id là khóa chính primary của bảng
        $this->_init('sample_hello', 'id');
    }
}
