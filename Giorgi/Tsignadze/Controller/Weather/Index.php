<?php

namespace Giorgi\Tsignadze\Controller\Weather;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    protected PageFactory $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $page_object = $this->pageFactory->create();;
        return $page_object;
    }
}
