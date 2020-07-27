<?php
namespace Haru\Hello\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Posts extends AbstractDb
{
    protected function _construct()
    {
        // haru_user là tên bảng , id là khóa chính primary của bảng
        $this->_init('haru_user', 'id');
    }
}
