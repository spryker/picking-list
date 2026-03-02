<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PickingListTransfer;
use Generated\Shared\Transfer\StockTransfer;
use Orm\Zed\PickingList\Persistence\SpyPickingList;
use Orm\Zed\Stock\Persistence\SpyStock;

class WarehouseMapper
{
    public function mapWarehouseEntityToWarehouseTransfer(
        SpyStock $warehouseEntity,
        StockTransfer $warehouseTransfer
    ): StockTransfer {
        return $warehouseTransfer->fromArray($warehouseEntity->toArray(), true);
    }

    public function mapWarehouseToPickingListEntity(
        PickingListTransfer $pickingListTransfer,
        SpyPickingList $pickingListEntity
    ): SpyPickingList {
        $pickingListEntity->setFkWarehouse(
            $pickingListTransfer->getWarehouseOrFail()->getIdStockOrFail(),
        );

        return $pickingListEntity;
    }
}
