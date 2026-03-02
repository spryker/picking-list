<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Filter;

use Generated\Shared\Transfer\PickingListCollectionResponseTransfer;
use Generated\Shared\Transfer\PickingListCollectionTransfer;

interface PickingListFilterInterface
{
    public function getValidPickingLists(
        PickingListCollectionResponseTransfer $pickingListCollectionResponseTransfer
    ): PickingListCollectionTransfer;

    public function getInvalidPickingLists(
        PickingListCollectionResponseTransfer $pickingListCollectionResponseTransfer
    ): PickingListCollectionTransfer;

    public function mergeValidAndInvalidPickingLists(
        PickingListCollectionTransfer $validPickingListCollectionTransfer,
        PickingListCollectionTransfer $invalidPickingListCollectionTransfer
    ): PickingListCollectionTransfer;
}
