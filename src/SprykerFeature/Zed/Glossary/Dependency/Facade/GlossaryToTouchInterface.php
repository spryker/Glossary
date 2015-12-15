<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Glossary\Dependency\Facade;

interface GlossaryToTouchInterface
{

    /**
     * @param string $itemType
     * @param int $idItem
     *
     * @return bool
     */
    public function touchActive($itemType, $idItem);

    /**
     * @param string $itemType
     * @param int $idItem
     *
     * @return bool
     */
    public function touchDeleted($itemType, $idItem);

}
