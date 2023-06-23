<?php

declare(strict_types=1);

namespace Zisato\Projection\Repository;

use Zisato\Projection\Criteria\Criteria;
use Zisato\Projection\OrderBy\OrderBy;
use Zisato\Projection\ValueObject\ProjectionModel;
use Zisato\Projection\ValueObject\ProjectionModelCollection;

interface ProjectionReadRepository
{
    public static function getProjectionModelName(): string;

    public function get(string $id): ProjectionModel;

    public function findBy(
        ?Criteria $criteria = null,
        ?int $offset = null,
        ?int $limit = null,
        ?OrderBy $orderBy = null
    ): ProjectionModelCollection;
}
