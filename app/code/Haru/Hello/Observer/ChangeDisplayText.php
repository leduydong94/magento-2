<?php

namespace Haru\Hello\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeDisplayText implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        echo $displayText->getText() . " - I'm Haru </br>";
        $displayText->setText('Execute event successfully.');

        return $this;
    }
}
