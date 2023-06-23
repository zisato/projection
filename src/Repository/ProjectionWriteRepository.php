<?php

declare(strict_types=1);

namespace Zisato\Projection\Repository;

use Zisato\Projection\ValueObject\ProjectionModel;

interface ProjectionWriteRepository
{
    public function save(ProjectionModel $projectionModel): void;

    public function delete(string $id): void;
}
