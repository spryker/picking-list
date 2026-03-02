<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\PickingList\Communication\Mapper\PickingListMapper;
use Spryker\Zed\PickingList\Communication\Mapper\PickingListMapperInterface;
use Spryker\Zed\PickingList\Dependency\Facade\PickingListToSalesFacadeInterface;
use Spryker\Zed\PickingList\PickingListDependencyProvider;

/**
 * @method \Spryker\Zed\PickingList\Business\PickingListFacadeInterface getFacade()
 * @method \Spryker\Zed\PickingList\PickingListConfig getConfig()
 * @method \Spryker\Zed\PickingList\Persistence\PickingListRepositoryInterface getRepository()
 * @method \Spryker\Zed\PickingList\Persistence\PickingListEntityManagerInterface getEntityManager()
 */
class PickingListCommunicationFactory extends AbstractCommunicationFactory
{
    public function createPickingListMapper(): PickingListMapperInterface
    {
        return new PickingListMapper();
    }

    public function getSalesFacade(): PickingListToSalesFacadeInterface
    {
        return $this->getProvidedDependency(PickingListDependencyProvider::FACADE_SALES);
    }
}
