<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\API\Repository\Events\Role;

use eZ\Publish\SPI\Repository\Event\AfterEvent;
use eZ\Publish\API\Repository\Values\User\PolicyDraft;
use eZ\Publish\API\Repository\Values\User\PolicyUpdateStruct;
use eZ\Publish\API\Repository\Values\User\RoleDraft;

interface UpdatePolicyByRoleDraftEvent extends AfterEvent
{
    public function getRoleDraft(): RoleDraft;

    public function getPolicy(): PolicyDraft;

    public function getPolicyUpdateStruct(): PolicyUpdateStruct;

    public function getUpdatedPolicyDraft(): PolicyDraft;
}
