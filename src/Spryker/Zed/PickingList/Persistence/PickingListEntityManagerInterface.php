<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Persistence;

use Generated\Shared\Transfer\PickingListTransfer;

interface PickingListEntityManagerInterface
{
    public function createPickingList(PickingListTransfer $pickingListTransfer): PickingListTransfer;

    public function updatePickingList(PickingListTransfer $pickingListTransfer): PickingListTransfer;
}
