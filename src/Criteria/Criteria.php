<?php

declare(strict_types=1);

namespace Zisato\Projection\Criteria;

class Criteria
{
    /**
     * @var array<CriteriaItem>
     */
    protected array $values;

    public function __construct(CriteriaItem ...$values)
    {
        $this->values = $values;
    }

    /**
     * @param array<CriteriaItem> $values
     */
    public static function fromArray(array $values = []): self
    {
        return new static(...$values);
    }

    /**
     * @param string $condition
     * @param mixed $value
     */
    public function add(string $column, $value, ?Condition $condition = null): void
    {
        if ($condition === null) {
            $condition = Condition::eq();
        }

        $this->values[] = new CriteriaItem($column, $value, $condition);
    }

    /**
     * @return iterable<CriteriaItem>
     */
    public function values(): iterable
    {
        foreach ($this->values as $value) {
            yield $value;
        }
    }
}
