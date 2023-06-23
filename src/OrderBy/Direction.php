<?php

declare(strict_types=1);

namespace Zisato\Projection\OrderBy;

final class Direction
{
    /**
     * @var string
     */
    public const DIRECTION_ASC = 'asc';

    /**
     * @var string
     */
    public const DIRECTION_DESC = 'desc';

    /**
     * @var string[]
     */
    private const VALID_VALUES = [self::DIRECTION_ASC, self::DIRECTION_DESC];

    private readonly string $value;

    public function __construct(string $value)
    {
        $this->checkValidValue($value);

        $this->value = $value;
    }

    public static function asc(): self
    {
        return new self(static::DIRECTION_ASC);
    }

    public static function desc(): self
    {
        return new self(static::DIRECTION_DESC);
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
