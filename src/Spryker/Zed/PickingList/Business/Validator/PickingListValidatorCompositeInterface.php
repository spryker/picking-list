<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Validator;

use Generated\Shared\Transfer\ErrorCollectionTransfer;
use Generated\Shared\Transfer\PickingListCollectionTransfer;

interface PickingListValidatorCompositeInterface
{
    public function validateCollection(
        PickingListCollectionTransfer $pickingListCollectionTransfer
    ): ErrorCollectionTransfer;
}
