<?php

namespace Zisato\Projection\Tests\Unit\OrderBy;

use Zisato\Projection\OrderBy\Direction;
use Zisato\Projection\OrderBy\OrderByItem;
use PHPUnit\Framework\TestCase;

class OrderByItemTest extends TestCase
{
    /**
     * @dataProvider getSuccessData
     */
    public function testCreateSuccessfully(string $column, Direction $direction)
    {
        $model = new OrderByItem($column, $direction);

        static::assertEquals($column, $model->column());
        static::assertEquals($direction, $model->direction());
    }

    public static function getSuccessData(): array
    {
        return [
            [
                'id',
                Direction::asc(),
            ],
            [
                'id',
                Direction::desc(),
            ],
        ];
    }
}
