<?php

declare(strict_types=1);

namespace Zisato\Projection\OrderBy;

class Direction
{
    public const DIRECTION_ASC = 'asc';

    public const DIRECTION_DESC = 'desc';

    private const VALID_VALUES = [self::DIRECTION_ASC, self::DIRECTION_DESC];

    private string $value;

    public function __construct(string $value)
    {
        $this->checkValidValue($value);

        $this->value = $value;
    }

    public static function asc(): self
    {
        return new static(self::DIRECTION_ASC);
    }

    public static function desc(): self
    {
        return new static(self::DIRECTION_DESC);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function checkValidValue(string $value): void
    {
        if (! in_array($value, self::VALID_VALUES, true)) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid direction %s. Allowed directions are: %s',
                $value,
                implode(', ', self::VALID_VALUES)
            ));
        }
    }
}
