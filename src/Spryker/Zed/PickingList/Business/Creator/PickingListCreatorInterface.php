<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Creator;

use Generated\Shared\Transfer\PickingListCollectionRequestTransfer;
use Generated\Shared\Transfer\PickingListCollectionResponseTransfer;

interface PickingListCreatorInterface
{
    public function createPickingListCollection(
        PickingListCollectionRequestTransfer $pickingListCollectionRequestTransfer
    ): PickingListCollectionResponseTransfer;
}
