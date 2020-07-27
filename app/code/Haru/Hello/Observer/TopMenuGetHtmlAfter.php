<?php
namespace Haru\Hello\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
//use Magento\Framework\View\Element\Template;
use Magento\Framework\View\LayoutInterface;

class TopMenuGetHtmlAfter implements ObserverInterface
{
    protected $_layout;
    public function __construct( LayoutInterface $layout)
    {
        $this->_layout = $layout;
    }

    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.
        $transportObject = $observer->getEvent()->getData('transportObject');
        if ($transportObject)
        {
//            die(1);
            $textLinkHtml = $this->_layout->createBlock(
                'Magento\Framework\View\Element\Template')->setTemplate('Haru_Hello::topmenu.phtml')->toHtml();
//            die($textLinkHtml); exit;
            $topMenuHtml = $transportObject->getHtml().$textLinkHtml;
            $transportObject->setHtml($topMenuHtml);
        }
        return $this;
    }
}


