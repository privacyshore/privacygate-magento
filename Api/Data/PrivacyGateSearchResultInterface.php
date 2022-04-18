<?php

namespace PrivacyGate\PaymentGateway\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PrivacyGateSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface[]
     */
    public function getItems();

    /**
     * @param \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
