<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\PickingList\Plugin;

use Generated\Shared\Transfer\PickingListCollectionTransfer;
use Generated\Shared\Transfer\PickingListOrderItemGroupTransfer;
use Generated\Shared\Transfer\PickingListTransfer;
use Spryker\Zed\PickingListExtension\Dependency\Plugin\PickingListGeneratorStrategyPluginInterface;

class PickingListGeneratorStrategyPluginMock implements PickingListGeneratorStrategyPluginInterface
{
    /**
     * @var \Generated\Shared\Transfer\PickingListTransfer
     */
    protected PickingListTransfer $pickingListTransfer;

    /**
     * @var bool
     */
    protected bool $isApplicable;

    public function __construct(
        PickingListTransfer $pickingListTransfer,
        bool $isApplicable
    ) {
        $this->pickingListTransfer = $pickingListTransfer;
        $this->isApplicable = $isApplicable;
    }

    public function isApplicable(PickingListOrderItemGroupTransfer $pickingListOrderItemGroupTransfer): bool
    {
        return $this->isApplicable;
    }

    public function generatePickingLists(PickingListOrderItemGroupTransfer $pickingListOrderItemGroupTransfer): PickingListCollectionTransfer
    {
        return (new PickingListCollectionTransfer())
            ->addPickingList((new PickingListTransfer())->fromArray($this->pickingListTransfer->toArray(), true));
    }
}
