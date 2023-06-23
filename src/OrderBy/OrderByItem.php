<?php

declare(strict_types=1);

namespace Zisato\Projection\OrderBy;

final class OrderByItem
{
    private readonly string $column;

    private readonly Direction $direction;

    public function __construct(string $column, Direction $direction)
    {
        $this->column = $column;
        $this->direction = $direction;
    }

    public function column(): string
    {
        return $this->column;
    }

    public function direction(): Direction
    {
        return $this->direction;
    }
}
