<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\PickingList\Helper;

use Codeception\Module;
use Generated\Shared\Transfer\PickingListCollectionRequestTransfer;
use Generated\Shared\Transfer\PickingListCollectionResponseTransfer;
use Generated\Shared\Transfer\PickingListTransfer;
use Orm\Zed\PickingList\Persistence\SpyPickingListItemQuery;
use Orm\Zed\PickingList\Persistence\SpyPickingListQuery;
use SprykerTest\Shared\Testify\Helper\DataCleanupHelperTrait;
use SprykerTest\Shared\Testify\Helper\LocatorHelperTrait;

class PickingListHelper extends Module
{
    use LocatorHelperTrait;
    use DataCleanupHelperTrait;

    public function havePickingList(PickingListTransfer $pickingListTransfer): ?PickingListTransfer
    {
        $pickingListCollectionRequestTransfer = (new PickingListCollectionRequestTransfer())
            ->addPickingList($pickingListTransfer)
            ->setIsTransactional(true);

        $pickingListCollectionResponseTransfer = $this->getLocator()
            ->pickingList()
            ->facade()
            ->createPickingListCollection($pickingListCollectionRequestTransfer);

        $this->getDataCleanupHelper()->_addCleanup(function () use ($pickingListCollectionResponseTransfer): void {
            $this->cleanupPickingListsWithItems($pickingListCollectionResponseTransfer);
        });

        /**
         * @var \ArrayObject<\Generated\Shared\Transfer\PickingListTransfer> $pickingListTransferCollection
         */
        $pickingListTransferCollection = $pickingListCollectionResponseTransfer->getPickingLists();

        return $pickingListTransferCollection->getIterator()->current();
    }

    protected function createPickingListQuery(): SpyPickingListQuery
    {
        return SpyPickingListQuery::create();
    }

    protected function createPickingListItemQuery(): SpyPickingListItemQuery
    {
        return SpyPickingListItemQuery::create();
    }

    protected function cleanupPickingListsWithItems(PickingListCollectionResponseTransfer $pickingListCollectionResponseTransfer): void
    {
        foreach ($pickingListCollectionResponseTransfer->getPickingLists() as $pickingListTransfer) {
            $this->cleanupPickingListItems($pickingListTransfer);

            $this->createPickingListQuery()
                ->findByIdPickingList($pickingListTransfer->getIdPickingList())
                ->delete();
        }
    }

    protected function cleanupPickingListItems(PickingListTransfer $pickingListTransfer): void
    {
        foreach ($pickingListTransfer->getPickingListItems() as $pickingListItemTransfer) {
            $this->createPickingListItemQuery()
                ->findByIdPickingListItem($pickingListItemTransfer->getIdPickingListItem())
                ->delete();
        }
    }
}
