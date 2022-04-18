<?php

namespace PrivacyGate\PaymentGateway\Model\ResourceModel\PrivacyGate;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PrivacyGate\PaymentGateway\Model\PrivacyGate', 'PrivacyGate\PaymentGateway\Model\ResourceModel\PrivacyGate');
    }
}
