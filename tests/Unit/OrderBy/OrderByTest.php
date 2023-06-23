<?php

namespace Zisato\Projection\Tests\Unit\OrderBy;

use Zisato\Projection\OrderBy\Direction;
use Zisato\Projection\OrderBy\OrderBy;
use Zisato\Projection\OrderBy\OrderByItem;
use PHPUnit\Framework\TestCase;

class OrderByTest extends TestCase
{
    public function testCreateFromArray()
    {
        $values = [
            new OrderByItem('id', Direction::asc())
        ];
        $expected = [
            new OrderByItem('id', Direction::asc())
        ];
        $model = OrderBy::fromArray($values);

        static::assertEquals($expected, iterator_to_array($model->values()));
    }

    /**
     * @dataProvider getSuccessData
     */
    public function testAddSuccessfully(string $column, ?Direction $direction, array $expected)
    {
        $model = new OrderBy();
        $model->add($column, $direction);

        static::assertEquals($expected, iterator_to_array($model->values()));
    }

    public static function getSuccessData(): array
    {
        return [
            [
                'id',
                null,
                [
                    new OrderByItem('id', Direction::asc()),
                ],
            ],
            [
                'id',
                Direction::desc(),
                [
                    new OrderByItem('id', Direction::desc()),
                ],
            ],
        ];
    }
}
