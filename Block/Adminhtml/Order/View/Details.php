<?php
/**
 * PrivacyGate
 */

namespace PrivacyGate\PaymentGateway\Block\Adminhtml\Order\View;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Sales\Api\OrderRepositoryInterface;
use PrivacyGate\PaymentGateway\Api\PrivacyGateRepositoryInterface;

class Details extends Template
{
    private $orderRepository;
    private $privacygateRepository;

    public function __construct(
        Context $context,
        OrderRepositoryInterface $orderRepository,
        PrivacyGateRepositoryInterface $privacygateRepository
    ) {
        parent::__construct($context);
        $this->orderRepository = $orderRepository;
        $this->privacygateRepository = $privacygateRepository;
    }

    private function getOrder()
    {
        $order = $this->orderRepository->get($this->getRequest()->getParam('order_id'));
        return $order;
    }

    private function getPrivacyGateRecord()
    {
        return $this->privacygateRepository->getByIncrementId($this->getOrder()->getIncrementId());
    }

    public function isPaymentMadeInPrivacyGate()
    {
        return $this->getOrder()->getPayment()->getMethod() == 'privacygatemethod';
    }

    public function getCoinsDetail()
    {
        $record = $this->getPrivacyGateRecord();
        $data['expectedCoins'] = $record->getCoinsExpected() . ' ' . $record->getReceivedCurrency();
        $data['amount'] = $record->getCoinsReceived() . ' ' . $record->getReceivedCurrency();
        $data['status'] = $record->getPrivacyGateStatus();
        $data['code'] = $record->getPrivacyGateChargeCode();
        $data['transactionId'] = $record->getTransactionId();
        $data['totalPaid'] = $record->getTotalPaid();
        $data['orderPlacedCurrency'] = $this->getOrder()->getOrderCurrencyCode();
        return $data;
    }
}
