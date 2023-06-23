<?php

namespace Zisato\Projection\Tests\Unit\OrderBy;

use Zisato\Projection\OrderBy\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    /**
     * @dataProvider getSuccessData
     */
    public function testCreateSuccessfully(string $method, string $expected)
    {
        /** @var Direction $model */
        $model = \call_user_func([Direction::class, $method]);

        static::assertEquals($expected, $model->value());
    }

    /**
     * @dataProvider getTestInvalidData
     */
    public function testItShouldThrowExceptionWhenInvalidValue(string $direction): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Direction($direction);
    }

    public static function getSuccessData(): array
    {
        return [
            ['asc', 'asc'],
            ['desc', 'desc'],
        ];
    }

    public static function getTestInvalidData(): array
    {
        return [
            [''],
            ['foo'],
        ];
    }
}
