<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Assigner;

use Generated\Shared\Transfer\UserCollectionTransfer;

interface PickingListUserAssignerInterface
{
    public function unassignPickingListsFromUsers(UserCollectionTransfer $userCollectionTransfer): UserCollectionTransfer;
}
