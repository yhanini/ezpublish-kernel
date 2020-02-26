<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\Core\Search\Legacy\Content\Common\Gateway\CriterionHandler;

use eZ\Publish\Core\Search\Legacy\Content\Common\Gateway\CriterionHandler;
use eZ\Publish\Core\Search\Legacy\Content\Common\Gateway\CriteriaConverter;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\Core\Persistence\Database\SelectQuery;

class ObjectStateIdentifier extends CriterionHandler
{
    public function accept(Criterion $criterion): bool
    {
        return $criterion instanceof Criterion\ObjectStateIdentifier;
    }

    public function handle(
        CriteriaConverter $converter,
        SelectQuery $query,
        Criterion $criterion,
        array $languageSettings
    ) {
        $subSelect = $query->subSelect();
        $subSelect
            ->select(
                $this->dbHandler->quoteColumn('contentobject_id', 't1')
            )->from(
                $query->alias(
                    $this->dbHandler->quoteTable('ezcobj_state_link'),
                    't1'
                )
            )->leftJoin(
                $query->alias(
                    $this->dbHandler->quoteTable('ezcobj_state'),
                    't2'
                ),
                $query->expr->eq(
                    $this->dbHandler->quoteColumn('contentobject_state_id', 't1'),
                    $this->dbHandler->quoteColumn('id', 't2')
                )
            )->where(
                $query->expr->in(
                    $this->dbHandler->quoteColumn('identifier', 't2'),
                    $criterion->value
                )
            );

        return $query->expr->in(
            $this->dbHandler->quoteColumn('id', 'ezcontentobject'),
            $subSelect
        );
    }
}
