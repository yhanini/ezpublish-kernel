<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\Parser;

class FieldComparisonTemplates extends Templates
{
    const NODE_KEY = 'field_comparison_templates';
    const INFO = 'Settings for field comparison templates';
    const INFO_TEMPLATE_KEY = 'Template file where to find block definition to display field comparison';
}
