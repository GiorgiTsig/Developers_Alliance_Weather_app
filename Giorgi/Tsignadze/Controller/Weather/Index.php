<?php

namespace Giorgi\Tsignadze\Controller\Weather;

use Giorgi\Tsignadze\Block\Main;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Psr\Log\LoggerInterface;
use Magento\Framework\View\LayoutFactory;


class Index extends Action
{
    protected PageFactory $pageFactory;

    protected LoggerInterface $logger;

    protected LayoutFactory $layoutFactory;


    public function __construct(
        Context $context,
        LoggerInterface   $logger,
        LayoutFactory     $layoutFactory,
        PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->logger = $logger;
        $this->layoutFactory = $layoutFactory;
        return parent::__construct($context);
    }

    private function generatehtmltopdf()
    {
        try {
            $DataHtml = $this->layoutFactory->create()
                ->createBlock(Main::class)
                ->setTemplate('Giorgi_Tsignadze::pdf.phtml')
                ->toHtml();

            $html2pdf = new Html2Pdf('P', 'A4', 'fr');
            $html2pdf->writeHTML($DataHtml);
            $html2pdf->output('convertpdf.pdf', 'D');
        } catch (Html2PdfException $exception) {
            $html2pdf->clean();
            $this->logger->error($exception->getMessage());
        }
    }

    public function execute()
    {
        if(array_key_exists('pdf',$_POST)){
            $this->generatehtmltopdf();
        }
        $page_object = $this->pageFactory->create();;
        return $page_object;
    }
}
