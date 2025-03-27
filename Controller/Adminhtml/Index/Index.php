<?php
/**
 * Copyright © Magecan, Inc. All rights reserved.
 */
namespace Magecan\AdminReindex\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Indexer\IndexerRegistry;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Magecan_AdminReindex::reindex';

    protected $indexerRegistry;
    protected $messageManager;
    protected $resultRedirectFactory;

    public function __construct(
        Context $context,
        IndexerRegistry $indexerRegistry,
        ManagerInterface $messageManager,
        RedirectFactory $resultRedirectFactory
    ) {
        parent::__construct($context);
        $this->indexerRegistry = $indexerRegistry;
        $this->messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    public function execute()
    {
        $indexerIds = $this->getRequest()->getParam('indexer_ids');
        if (!is_array($indexerIds)) {
            $this->messageManager->addErrorMessage(__('Please select indexers.'));
        } else {
            $reindexCount = 0;

            try {
                foreach ($indexerIds as $indexerId) {
                    /** @var \Magento\Framework\Indexer\IndexerInterface $model */
                    $indexer = $this->_objectManager->get(
                        \Magento\Framework\Indexer\IndexerRegistry::class
                    )->get($indexerId);
               
                    $indexer->reindexAll();
                    $reindexCount++;
                }
                $this->messageManager->addSuccessMessage(
                    __('%1 indexer(s) have been reindexed.', $reindexCount)
                );
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException(
                    $e,
                    __("We couldn't reindex because of an error.")
                );
            }
        }

        return $this->resultRedirectFactory->create()->setPath('indexer/indexer/list');
    }
}
