<?php
/**
 * Copyright © Copyright 2024 (c) Chris Snedaker.  All Rights Reserved. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Cs\AbuseApi\Model;

use Cs\AbuseApi\Api\CheckRepositoryInterface;
use Cs\AbuseApi\Api\Data\CheckInterface;
use Cs\AbuseApi\Api\Data\CheckInterfaceFactory;
use Cs\AbuseApi\Api\Data\CheckSearchResultsInterfaceFactory;
use Cs\AbuseApi\Model\ResourceModel\Check as ResourceCheck;
use Cs\AbuseApi\Model\ResourceModel\Check\CollectionFactory as CheckCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class CheckRepository implements CheckRepositoryInterface
{

    /**
     * @var CheckCollectionFactory
     */
    protected $checkCollectionFactory;

    /**
     * @var Check
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceCheck
     */
    protected $resource;

    /**
     * @var CheckInterfaceFactory
     */
    protected $checkFactory;


    /**
     * @param ResourceCheck $resource
     * @param CheckInterfaceFactory $checkFactory
     * @param CheckCollectionFactory $checkCollectionFactory
     * @param CheckSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCheck $resource,
        CheckInterfaceFactory $checkFactory,
        CheckCollectionFactory $checkCollectionFactory,
        CheckSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->checkFactory = $checkFactory;
        $this->checkCollectionFactory = $checkCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(CheckInterface $check)
    {
        try {
            $this->resource->save($check);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the check: %1',
                $exception->getMessage()
            ));
        }
        return $check;
    }

    /**
     * @inheritDoc
     */
    public function get($checkId)
    {
        $check = $this->checkFactory->create();
        $this->resource->load($check, $checkId);
        if (!$check->getId()) {
            throw new NoSuchEntityException(__('Check with id "%1" does not exist.', $checkId));
        }
        return $check;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->checkCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(CheckInterface $check)
    {
        try {
            $checkModel = $this->checkFactory->create();
            $this->resource->load($checkModel, $check->getCheckId());
            $this->resource->delete($checkModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Check: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($checkId)
    {
        return $this->delete($this->get($checkId));
    }
}

