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

    /**
     * @param \Propel\Runtime\Connection\ConnectionInterface $propelConnection
     */
    public function __construct(ConnectionInterface $propelConnection)
    {
        $this->propelConnection = $propelConnection;
    }

    /**
     * @return bool
     */
    public function beginTransaction(): bool
    {
        return $this->propelConnection->beginTransaction();
    }

    /**
     * @return bool
     */
    public function commit(): bool
    {
        return $this->propelConnection->commit();
    }

    /**
     * @return bool
     */
    public function rollBack(): bool
    {
        return $this->propelConnection->rollBack();
    }
}
