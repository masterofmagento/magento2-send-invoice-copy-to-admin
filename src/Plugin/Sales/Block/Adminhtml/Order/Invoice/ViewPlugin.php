<?php
/**
 * @author      Oleh Kravets <oleh@openstream.ch>
 * @copyright   Copyright (c) 2020 Openstream Internet Solutions  (https://www.openstream.ch)
 * @license     MIT License
 */

namespace Openstream\SalesEmailCopy\Plugin\Sales\Block\Adminhtml\Order\Invoice;

use Magento\Framework\View\LayoutInterface;
use Magento\Sales\Block\Adminhtml\Order\Invoice\View;

class ViewPlugin
{
    /**
     * @param View $view
     * @param LayoutInterface $layout
     * @return array
     */
    public function beforeSetLayout(View $view, LayoutInterface $layout)
    {
        $message = __('Are you sure you want to do send an invoice email to Admin?');
        // todo: adjust URL
        $url = $view->getUrl('/openstream/controller/action/', ['id' => $view->getInvoice()->getId()]);

        $view->addButton(
            'send_email_admin',
            [
                'label' => __('Send Email to Admin'),
                'class' => 'send',
                'onclick' => "confirmSetLocation('{$message}', '{$url}')"
            ]
        );

        return [$layout];
    }
}