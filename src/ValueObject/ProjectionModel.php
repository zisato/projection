<?php

declare(strict_types=1);

namespace Zisato\Projection\ValueObject;

abstract class ProjectionModel
{
    /**
     * @var array<mixed, mixed>
     */
    private array $data = [];

    /**
     * @param array<mixed, mixed> $data
     */
    final private function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param array<mixed, mixed> $data
     */
    public static function fromData(array $data): self
    {
        return new static($data);
    }

    /**
     * @return array<mixed, mixed>
     */
    public function data(): array
    {
        return $this->data;
    }

    /**
     * @param array<mixed, mixed> $data
     */
    public function changeData(array $data): void
    {
        $this->data = $data;
    }
}
