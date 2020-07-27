<?php

namespace Haru\Hello\Controller\Index;

use Magento\Framework\App\Action\Action;

class Test extends Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'HelloWorld'));
        $this->_eventManager->dispatch('helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
