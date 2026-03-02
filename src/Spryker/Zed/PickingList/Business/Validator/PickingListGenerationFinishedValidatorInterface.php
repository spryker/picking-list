<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Business\Validator;

use Generated\Shared\Transfer\PickingListGenerationFinishedRequestTransfer;
use Generated\Shared\Transfer\PickingListGenerationFinishedResponseTransfer;

interface PickingListGenerationFinishedValidatorInterface
{
    public function isPickingListGenerationFinished(
        PickingListGenerationFinishedRequestTransfer $pickingListGenerationFinishedRequestTransfer
    ): PickingListGenerationFinishedResponseTransfer;
}
