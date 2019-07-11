<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\API\Repository\Events\URLWildcard;

use eZ\Publish\SPI\Repository\Event\AfterEvent;
use eZ\Publish\API\Repository\Values\Content\URLWildcardTranslationResult;

interface TranslateEvent extends AfterEvent
{
    public function getUrl();

    public function getResult(): URLWildcardTranslationResult;
}
