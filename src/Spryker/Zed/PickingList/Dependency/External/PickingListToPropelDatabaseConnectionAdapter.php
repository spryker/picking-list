<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PickingList\Dependency\External;

use Propel\Runtime\Connection\ConnectionInterface;

class PickingListToPropelDatabaseConnectionAdapter implements PickingListToDatabaseConnectionInterface
{
    /**
     * @var \Propel\Runtime\Connection\ConnectionInterface
     */
    protected ConnectionInterface $propelConnection;

    public function __construct(ConnectionInterface $propelConnection)
    {
        $this->propelConnection = $propelConnection;
    }

    public function beginTransaction(): bool
    {
        return $this->propelConnection->beginTransaction();
    }

    public function commit(): bool
    {
        return $this->propelConnection->commit();
    }

    public function rollBack(): bool
    {
        return $this->propelConnection->rollBack();
    }
}
