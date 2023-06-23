<?php

declare(strict_types=1);

namespace Zisato\Projection\Criteria;

final class Condition
{
    /**
     * @var string
     */
    public const CONDITION_EQUALS = 'eq';

    /**
     * @var string
     */
    public const CONDITION_GREATER = 'gt';

    /**
     * @var string
     */
    public const CONDITION_GREATER_EQUALS = 'gte';

    /**
     * @var string
     */
    public const CONDITION_IN = 'in';

    /**
     * @var string
     */
    public const CONDITION_LIKE = 'like';

    /**
     * @var string
     */
    public const CONDITION_LOWER = 'lt';

    /**
     * @var string
     */
    public const CONDITION_LOWER_EQUALS = 'lte';

    /**
     * @var string
     */
    public const CONDITION_NOT_EQUALS = 'neq';

    /**
     * @var string
     */
    public const CONDITION_NOT_IN = 'nin';

    /**
     * @var string
     */
    public const CONDITION_NOT_LIKE = 'nlike';

    /**
     * @var string[]
     */
    private const VALID_VALUES = [
        self::CONDITION_EQUALS,
        self::CONDITION_GREATER,
        self::CONDITION_GREATER_EQUALS,
        self::CONDITION_IN,
        self::CONDITION_LIKE,
        self::CONDITION_LOWER,
        self::CONDITION_LOWER_EQUALS,
        self::CONDITION_NOT_EQUALS,
        self::CONDITION_NOT_IN,
        self::CONDITION_NOT_LIKE,
    ];

    private readonly string $value;

    public function __construct(string $value)
    {
        $this->checkValidValue($value);

        $this->value = $value;
    }

    public static function eq(): self
    {
        return new self(static::CONDITION_EQUALS);
    }

    public static function gt(): self
    {
        return new self(static::CONDITION_GREATER);
    }

    public static function gte(): self
    {
        return new self(static::CONDITION_GREATER_EQUALS);
    }

    public static function in(): self
    {
        return new self(static::CONDITION_IN);
    }

    public static function like(): self
    {
        return new self(static::CONDITION_LIKE);
    }

    public static function lt(): self
    {
        return new self(static::CONDITION_LOWER);
    }

    public static function lte(): self
    {
        return new self(static::CONDITION_LOWER_EQUALS);
    }

    public static function notEq(): self
    {
        return new self(static::CONDITION_NOT_EQUALS);
    }

    public static function notIn(): self
    {
        return new self(static::CONDITION_NOT_IN);
    }

    public static function notLike(): self
    {
        return new self(static::CONDITION_NOT_LIKE);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function checkValidValue(string $value): void
    {
        if (! in_array($value, self::VALID_VALUES, true)) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid condition %s. Allowed condition are: %s',
                $value,
                implode(', ', self::VALID_VALUES)
            ));
        }
    }
}
