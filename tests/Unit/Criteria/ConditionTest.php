<?php

namespace Zisato\Projection\Tests\Unit\Criteria;

use PHPUnit\Framework\TestCase;
use Zisato\Projection\Criteria\Condition;

class ConditionTest extends TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testItShouldCreateSuccessfully(string $condition): void
    {
        $expectedCondition = new Condition($condition);

        $this->assertEquals($condition, $expectedCondition->value());
    }

    /**
     * @dataProvider getTestStaticMethodsData
     */
    public function testItShouldCreateWitStaticMethodsSuccessfully(string $condition, string $expected): void
    {
        $expectedCondition = \call_user_func([Condition::class, $condition]);

        $this->assertEquals($expectedCondition->value(), $expected);
    }

    /**
     * @dataProvider getTestInvalidData
     */
    public function testItShouldThrowExceptionWhenInvalidValue(string $condition): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Condition($condition);
    }

    public static function getTestData(): array
    {
        return [
            [
                Condition::CONDITION_EQUALS
            ],
            [
                Condition::CONDITION_GREATER
            ],
            [
                Condition::CONDITION_GREATER_EQUALS
            ],
            [
                Condition::CONDITION_LOWER
            ],
            [
                Condition::CONDITION_LOWER_EQUALS
            ],
            [
                Condition::CONDITION_LIKE
            ],
            [
                Condition::CONDITION_IN
            ],
        ];
    }

    public static function getTestStaticMethodsData(): array
    {
        return [
            [
                'eq',
                'eq',
            ],
            [
                'gt',
                'gt',
            ],
            [
                'gte',
                'gte',
            ],
            [
                'lt',
                'lt',
            ],
            [
                'lte',
                'lte',
            ],
            [
                'like',
                'like',
            ],
            [
                'in',
                'in',
            ],
            [
                'notEq',
                'neq',
            ],
            [
                'notIn',
                'nin',
            ],
            [
                'notLike',
                'nlike',
            ],
        ];
    }

    public static function getTestInvalidData(): array
    {
        return [
            [
                ''
            ],
            [
                'foo'
            ],
        ];
    }
}
