<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PickingListCollectionTransfer;
use Generated\Shared\Transfer\PickingListItemTransfer;
use Generated\Shared\Transfer\PickingListTransfer;
use Generated\Shared\Transfer\StockTransfer;
use Orm\Zed\PickingList\Persistence\SpyPickingList;
use Orm\Zed\PickingList\Persistence\SpyPickingListItem;
use Propel\Runtime\Collection\ObjectCollection;

class PickingListMapper
{
    /**
     * @var \Spryker\Zed\PickingList\Persistence\Propel\Mapper\PickingListItemMapper
     */
    protected PickingListItemMapper $pickingListItemMapper;

    /**
     * @var \Spryker\Zed\PickingList\Persistence\Propel\Mapper\WarehouseMapper
     */
    protected WarehouseMapper $warehouseMapper;

    /**
     * @var \Spryker\Zed\PickingList\Persistence\Propel\Mapper\UserMapper
     */
    protected UserMapper $userMapper;

    public function __construct(
        PickingListItemMapper $pickingListItemMapper,
        WarehouseMapper $warehouseMapper,
        UserMapper $userMapper
    ) {
        $this->pickingListItemMapper = $pickingListItemMapper;
        $this->warehouseMapper = $warehouseMapper;
        $this->userMapper = $userMapper;
    }

    public function mapPickingListTransferToPickingListEntity(
        PickingListTransfer $pickingListTransfer,
        SpyPickingList $pickingListEntity
    ): SpyPickingList {
        $pickingListEntity = $pickingListEntity
            ->fromArray($pickingListTransfer->modifiedToArray());

        $pickingListEntity = $this->warehouseMapper->mapWarehouseToPickingListEntity($pickingListTransfer, $pickingListEntity);
        $pickingListEntity = $this->userMapper->mapPickingListUserToPickingListEntity($pickingListTransfer, $pickingListEntity);

        return $pickingListEntity;
    }

    public function mapPickingListEntityToPickingListTransfer(
        SpyPickingList $pickingListEntity,
        PickingListTransfer $pickingListTransfer
    ): PickingListTransfer {
        $pickingListTransfer = $pickingListTransfer->fromArray(
            $pickingListEntity->toArray(),
            true,
        );

        $pickingListTransfer = $this->userMapper->mapPickingListEntityUserToPickingListTransfer($pickingListEntity, $pickingListTransfer);

        $warehouseTransfer = $this->warehouseMapper->mapWarehouseEntityToWarehouseTransfer(
            $pickingListEntity->getSpyStock(),
            new StockTransfer(),
        );
        $pickingListTransfer->setWarehouse($warehouseTransfer);

        return $pickingListTransfer;
    }

    public function mapPickingListItemEntityToPickingListTransfer(
        SpyPickingListItem $pickingListItemEntity,
        PickingListTransfer $pickingListTransfer
    ): PickingListTransfer {
        return $pickingListTransfer->addPickingListItem(
            $this->pickingListItemMapper->mapPickingListItemEntityToPickingListItemTransfer(
                $pickingListItemEntity,
                new PickingListItemTransfer(),
            ),
        );
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Orm\Zed\PickingList\Persistence\SpyPickingList> $pickingListEntityCollection
     * @param \Generated\Shared\Transfer\PickingListCollectionTransfer $pickingListCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\PickingListCollectionTransfer
     */
    public function mapPickingListEntityCollectionToPickingListCollectionTransfer(
        ObjectCollection $pickingListEntityCollection,
        PickingListCollectionTransfer $pickingListCollectionTransfer
    ): PickingListCollectionTransfer {
        foreach ($pickingListEntityCollection as $pickingListEntity) {
            $pickingListTransfer = $this->mapPickingListEntityToPickingListTransfer(
                $pickingListEntity,
                new PickingListTransfer(),
            );

            foreach ($pickingListEntity->getSpyPickingListItems() as $pickingListItemEntity) {
                $pickingListItemTransfer = $this->pickingListItemMapper
                    ->mapPickingListItemEntityToPickingListItemTransfer(
                        $pickingListItemEntity,
                        new PickingListItemTransfer(),
                    );

                $pickingListTransfer->addPickingListItem($pickingListItemTransfer);
            }

            $pickingListCollectionTransfer->addPickingList($pickingListTransfer);
        }

        return $pickingListCollectionTransfer;
    }
}
