<?php

declare(strict_types=1);

namespace Zisato\Projection\Transformer;

use Zisato\Projection\ValueObject\ProjectionModel;

interface ProjectionModelTransformer
{
    /**
     * @return array<mixed, mixed>
     */
    public function transform(ProjectionModel $projectionModel): array;
}
