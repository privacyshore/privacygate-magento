<?php
/**
 * A Magento 2 module named PrivacyGate/PaymentGateway
 * Copyright (C) 2017 PrivacyGate
 *
 * This file included in PrivacyGate/PaymentGateway is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace PrivacyGate\PaymentGateway\Model\Payment;

class PrivacyGatemethod extends \Magento\Payment\Model\Method\AbstractMethod
{
    protected $_code = "privacygatemethod";
    protected $_isOffline = true;

    public function isAvailable(
        \Magento\Quote\Api\Data\CartInterface $quote = null
    ) {
        $apiKey = $this->_scopeConfig->getValue(
            'payment/privacygatemethod/api_key',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $apiSecret = $this->_scopeConfig->getValue(
            'payment/privacygatemethod/api_secret',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if (!$apiKey || !$apiSecret) {
            return false;
        }
        return parent::isAvailable($quote);
    }
}
