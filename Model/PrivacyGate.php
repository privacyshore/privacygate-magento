<?php

namespace PrivacyGate\PaymentGateway\Model;

use PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface;
use Magento\Framework\DataObject\IdentityInterface;

class PrivacyGate extends \Magento\Framework\Model\AbstractModel implements PrivacyGateInterface, IdentityInterface
{
    /**
     * PrivacyGate Order
     */
    const CACHE_TAG = 'privacygate_order';

    /**
     * @var string
     */
    protected $_cacheTag = 'privacygate_order';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'privacygate_order';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PrivacyGate\PaymentGateway\Model\ResourceModel\PrivacyGate');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get Store order increment id
     *
     * @return string
     */
    public function getStoreOrderId()
    {
        return $this->getData(self::STORE_ORDER_ID);
    }

    /**
     * Get PrivacyGate charge code
     *
     * @return string
     */
    public function getPrivacyGateChargeCode()
    {
        return $this->getData(self::PRIVACYGATE_CHARGE_CODE);
    }

    /**
     * Gets the transaction id of privacygate payment.
     *
     * @return string|null Transaction Id.
     */
    public function getTransactionId()
    {
        return $this->getData(self::TRANSACTION_ID);
    }

    /**
     * Gets status of privacygate payment.
     *
     * @return string|null Status.
     */
    public function getPrivacyGateStatus()
    {
        return $this->getData(self::PRIVACYGATE_STATUS);
    }

    /**
     * Gets the amount of coins received.
     *
     * @return float|null Amount received.
     */
    public function getCoinsReceived()
    {
        return $this->getData(self::COINS_RECEIVED);
    }

    /**
     * Gets the amount of coins expected from customer.
     *
     * @return float|null Expected Amount.
     */
    public function getCoinsExpected()
    {
        return $this->getData(self::COINS_EXPECTED);
    }

    /**
     * Gets currency in which coins are received.
     *
     * @return string|null Currency.
     */
    public function getReceivedCurrency()
    {
        return $this->getData(self::RECEIVED_CURRENCY);
    }

    /**
     * Gets the amount of money paid by cutomer.
     *
     * @return float|null Amount received.
     */
    public function getTotalPaid()
    {
        return $this->getData(self::TOTAL_PAID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param string $incrementId
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setStoreOrderId($incrementId)
    {
        return $this->setData(self::STORE_ORDER_ID, $incrementId);
    }

    /**
     * @param string $charge
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setPrivacyGateChargeCode($charge)
    {
        return $this->setData(self::PRIVACYGATE_CHARGE_CODE, $charge);
    }

    /**
     * @param string $id
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setTransactionId($id)
    {
        return $this->setData(self::TRANSACTION_ID, $id);
    }

    /**
     * @param string $status
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setPrivacyGateStatus($status)
    {
        return $this->setData(self::PRIVACYGATE_STATUS, $status);
    }

    /**
     * @param float $amount
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setCoinsReceived($amount)
    {
        return $this->setData(self::COINS_RECEIVED, $amount);
    }

    /**
     * @param float $amount
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setCoinsExpected($amount)
    {
        return $this->setData(self::COINS_EXPECTED, $amount);
    }

    /**
     * @param string $currency
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setReceivedCurrency($currency)
    {
        return $this->setData(self::RECEIVED_CURRENCY, $currency);
    }

    /**
     * @param float $amount
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface
     */
    public function setTotalPaid($amount)
    {
        return $this->setData(self::TOTAL_PAID, $amount);
    }
}
