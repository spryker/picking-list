<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Reader;

use Generated\Shared\Transfer\WarehouseUserAssignmentCollectionTransfer;
use Generated\Shared\Transfer\WarehouseUserAssignmentCriteriaTransfer;
use Spryker\Zed\PickingList\Dependency\Facade\PickingListToWarehouseUserInterface;

class WarehouseUserAssignmentReader implements WarehouseUserAssignmentReaderInterface
{
    /**
     * @var \Spryker\Zed\PickingList\Dependency\Facade\PickingListToWarehouseUserInterface
     */
    protected PickingListToWarehouseUserInterface $warehouseUserFacade;

    public function __construct(PickingListToWarehouseUserInterface $warehouseUserFacade)
    {
        $this->warehouseUserFacade = $warehouseUserFacade;
    }

    public function getWarehouseUserAssignmentCollection(
        WarehouseUserAssignmentCriteriaTransfer $warehouseUserAssignmentCriteriaTransfer
    ): WarehouseUserAssignmentCollectionTransfer {
        return $this->warehouseUserFacade->getWarehouseUserAssignmentCollection($warehouseUserAssignmentCriteriaTransfer);
    }
}
