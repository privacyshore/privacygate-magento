<?php

namespace PrivacyGate\PaymentGateway\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use PrivacyGate\PaymentGateway\Api\Data\PrivacyGateInterface;
use PrivacyGate\PaymentGateway\Api\Data\PrivacyGateSearchResultInterface;
use PrivacyGate\PaymentGateway\Api\Data\PrivacyGateSearchResultInterfaceFactory;
use PrivacyGate\PaymentGateway\Api\PrivacyGateRepositoryInterface;
use PrivacyGate\PaymentGateway\Model\ResourceModel\PrivacyGate\Collection as PrivacyGateCollectionFactory;
use PrivacyGate\PaymentGateway\Model\ResourceModel\PrivacyGate\Collection;

class PrivacyGateRepository implements PrivacyGateRepositoryInterface
{
    /**
     * @var PrivacyGate
     */
    private $privacygateFactory;

    /**
     * @var PrivacyGateCollectionFactory
     */
    private $privacygateCollectionFactory;

    /**
     * @var PrivacyGateSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        PrivacyGateFactory $privacygateFactory,
        PrivacyGateCollectionFactory $privacygateCollectionFactory,
        PrivacyGateSearchResultInterfaceFactory $privacygateSearchResultInterfaceFactory
    ) {
        $this->privacygateFactory = $privacygateFactory;
        $this->privacygateCollectionFactory = $privacygateCollectionFactory;
        $this->searchResultFactory = $privacygateSearchResultInterfaceFactory;
    }

    public function get($id)
    {
        $privacygate = $this->privacygateFactory->create();
        $privacygate->getResource()->load($privacygate, $id);
        if (!$privacygate->getId()) {
            throw new NoSuchEntityException(__('Unable to find privacygate order with ID "%1"', $id));
        }
        return $privacygate;
    }

    public function getByIncrementId($incrementId)
    {
        $privacygate = $this->privacygateFactory->create();
        $privacygate->getResource()->load($privacygate, $incrementId, 'store_order_id');
        if (!$privacygate->getId()) {
            throw new NoSuchEntityException(__('Unable to find privacygate order with store id "%1"', $incrementId));
        }
        return $privacygate;
    }

    public function getByChargeCode($chargeCode)
    {
        $privacygate = $this->privacygateFactory->create();
        $privacygate->getResource()->load($privacygate, $chargeCode, 'privacygate_charge_code');
        if (!$privacygate->getId()) {
            throw new NoSuchEntityException(__('Unable to find privacygate order with charge code "%1"', $chargeCode));
        }
        return $privacygate;
    }

    public function save(PrivacyGateInterface $privacygate)
    {
        $privacygate->getResource()->save($privacygate);
        return $privacygate;
    }

    public function delete(PrivacyGateInterface $privacygate)
    {
        $privacygate->getResource()->delete($privacygate);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
