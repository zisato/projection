<?php

declare(strict_types=1);

namespace Zisato\Projection\Criteria;

final class CriteriaItem
{
    private readonly string $column;

    /**
     * @var mixed
     */
    private $value;

    private readonly Condition $condition;

    /**
     * @param mixed $value
     */
    public function __construct(string $column, $value, Condition $condition)
    {
        $this->column = $column;
        $this->value = $value;
        $this->condition = $condition;
    }

    public function column(): string
    {
        return $this->column;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    public function condition(): Condition
    {
        return $this->condition;
    }
}
