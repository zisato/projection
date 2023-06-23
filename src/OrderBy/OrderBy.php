<?php

declare(strict_types=1);

namespace Zisato\Projection\OrderBy;

class OrderBy
{
    /**
     * @var array<OrderByItem>
     */
    protected array $values;

    public function __construct(OrderByItem ...$values)
    {
        $this->values = $values;
    }

    /**
     * @param array<OrderByItem> $values
     */
    public static function fromArray(array $values = []): self
    {
        return new static(...$values);
    }

    public function add(string $column, ?Direction $direction = null): void
    {
        if ($direction === null) {
            $direction = Direction::asc();
        }

        $this->values[] = new OrderByItem($column, $direction);
    }

    /**
     * @return iterable<OrderByItem>
     */
    public function values(): iterable
    {
        foreach ($this->values as $value) {
            yield $value;
        }
    }
}
