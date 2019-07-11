<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\Core\Event\Section;

use eZ\Publish\API\Repository\Events\Section\BeforeDeleteSectionEvent as BeforeDeleteSectionEventInterface;
use eZ\Publish\API\Repository\Values\Content\Section;
use Symfony\Contracts\EventDispatcher\Event;

final class BeforeDeleteSectionEvent extends Event implements BeforeDeleteSectionEventInterface
{
    /** @var \eZ\Publish\API\Repository\Values\Content\Section */
    private $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function getSection(): Section
    {
        return $this->section;
    }
}
