<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Persistence;

use Generated\Shared\Transfer\PickingListCollectionTransfer;
use Generated\Shared\Transfer\PickingListCriteriaTransfer;
use Generated\Shared\Transfer\PickingListItemCollectionTransfer;
use Generated\Shared\Transfer\PickingListItemCriteriaTransfer;

interface PickingListRepositoryInterface
{
    public function getPickingListCollection(
        PickingListCriteriaTransfer $pickingListCriteriaTransfer
    ): PickingListCollectionTransfer;

    public function getPickingListItemCollection(
        PickingListItemCriteriaTransfer $pickingListItemCriteriaTransfer
    ): PickingListItemCollectionTransfer;
}
