<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Extractor;

use ArrayObject;

interface WarehouseExtractorInterface
{
    /**
     * @param \ArrayObject<int, \Generated\Shared\Transfer\ItemTransfer> $itemTransferCollection
     *
     * @return \ArrayObject<int, \Generated\Shared\Transfer\StockTransfer>
     */
    public function extractWarehousesFromItemTransferCollection(ArrayObject $itemTransferCollection): ArrayObject;
}
