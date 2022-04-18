<?php
/**
 * PrivacyGate
 */
namespace PrivacyGate\PaymentGateway\Api;

/**
 * PrivacyGate repository interface.
 */
interface PrivacyGateRepositoryInterface
{
    /**
     * Lists orders that match specified search criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria The search criteria.
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateSearchResultInterface Order search result interface.
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Loads a specified order.
     *
     * @param int $id The order ID.
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface Order interface.
     */
    public function get($id);

    /**
     * Loads a specified order.
     *
     * @param string $incrementId Increment id of order in store.
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface Order interface.
     */
    public function getByIncrementId($incrementId);

    /**
     * Loads a specified order.
     *
     * @param string $chargeCode Charge code of privacygate order.
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface Order interface.
     */
    public function getByChargeCode($chargeCode);

    /**
     * Deletes a specified order.
     *
     * @param \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface $entity The order ID.
     * @return bool
     */
    public function delete(\PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface $entity);

    /**
     * Performs persist operations for a specified order.
     *
     * @param \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface $entity The order ID.
     * @return \PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface Order interface.
     */
    public function save(\PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface $entity);
}
