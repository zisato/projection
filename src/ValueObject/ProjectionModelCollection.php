<?php

declare(strict_types=1);

namespace Zisato\Projection\ValueObject;

final class ProjectionModelCollection
{
    private readonly int $total;

    /**
     * @var array<ProjectionModel>
     */
    private array $data = [];

    private int $count;

    public function __construct(int $total, ProjectionModel ...$values)
    {
        $this->total = $total;
        $this->data = $values;
        $this->count = func_num_args() - 1;
    }

    /**
     * @param array<ProjectionModel> $values
     */
    public static function create(int $total, array $values = []): self
    {
        return new self($total, ...$values);
    }

    public function add(ProjectionModel $value): void
    {
        $this->data[] = $value;
        ++$this->count;
    }

    /**
     * @return iterable<ProjectionModel>
     */
    public function data(): iterable
    {
        foreach ($this->data as $value) {
            yield $value;
        }
    }

    public function total(): int
    {
        return $this->total;
    }

    public function count(): int
    {
        return $this->count;
    }
}
