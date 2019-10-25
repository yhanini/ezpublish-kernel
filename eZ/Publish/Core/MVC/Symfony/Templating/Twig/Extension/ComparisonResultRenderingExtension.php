<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\Core\MVC\Symfony\Templating\Twig\Extension;

use eZ\Publish\API\Repository\Values\Content\Content;
use eZ\Publish\API\Repository\Values\Content\Field;
use eZ\Publish\Core\MVC\Symfony\Templating\FieldBlockRendererInterface;
use eZ\Publish\SPI\Comparison\ComparisonResult;
use eZ\Publish\API\Repository\Values\ContentType\FieldDefinition;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;
use eZ\Publish\Core\MVC\Symfony\Templating\Exception\MissingFieldBlockException;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Template;
use Twig\TwigFunction;

class ComparisonResultRenderingExtension extends AbstractExtension
{
    /** @var \eZ\Publish\Core\MVC\Symfony\Templating\FieldBlockRendererInterface */
    private $fieldBlockRenderer;

    /**
     */
    public function __construct(FieldBlockRendererInterface $fieldBlockRenderer)
    {
        $this->fieldBlockRenderer = $fieldBlockRenderer;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction(
                'ez_render_comparison_result',
                function (FieldDefinition $fieldDefinition, ComparisonResult $comparisonResult, array $params = []) {

                    return $this->fieldBlockRenderer->renderContentFieldComparison($fieldDefinition, $comparisonResult, $params);
                },
                ['is_safe' => ['html']]
            ),
        ];
    }
}
