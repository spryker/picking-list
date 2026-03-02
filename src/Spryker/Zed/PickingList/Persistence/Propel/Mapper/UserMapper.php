<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PickingListTransfer;
use Generated\Shared\Transfer\UserTransfer;
use Orm\Zed\PickingList\Persistence\SpyPickingList;

class UserMapper
{
    public function mapPickingListUserToPickingListEntity(
        PickingListTransfer $pickingListTransfer,
        SpyPickingList $pickingListEntity
    ): SpyPickingList {
        $userTransfer = $pickingListTransfer->getUser();
        if ($userTransfer === null || $userTransfer->getUuid() === null) {
            $pickingListEntity->setUserUuid(null);

            return $pickingListEntity;
        }

        $pickingListEntity->setUserUuid($userTransfer->getUuidOrFail());

        return $pickingListEntity;
    }

    public function mapPickingListEntityUserToPickingListTransfer(
        SpyPickingList $pickingListEntity,
        PickingListTransfer $pickingListTransfer
    ): PickingListTransfer {
        if ($pickingListEntity->getUserUuid() === null) {
            return $pickingListTransfer;
        }

        $pickingListTransfer->setUser((new UserTransfer())
            ->setUuid($pickingListEntity->getUserUuid()));

        return $pickingListTransfer;
    }
}
