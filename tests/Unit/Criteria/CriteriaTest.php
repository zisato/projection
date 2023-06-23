<?php

namespace Zisato\Projection\Tests\Unit\Criteria;

use Zisato\Projection\Criteria\Condition;
use Zisato\Projection\Criteria\Criteria;
use Zisato\Projection\Criteria\CriteriaItem;
use PHPUnit\Framework\TestCase;

class CriteriaTest extends TestCase
{
    public function testCreateFromArray()
    {
        $values = [
            new CriteriaItem('id', '1', Condition::eq())
        ];
        $expected = [
            new CriteriaItem('id', '1', Condition::eq())
        ];
        $model = Criteria::fromArray($values);

        static::assertEquals($expected, iterator_to_array($model->values()));
    }

    /**
     * @dataProvider getSuccessData
     */
    public function testAddSuccessfully(string $column, $value, ?Condition $condition, array $expected)
    {
        $model = new Criteria();
        $model->add($column, $value, $condition);

        static::assertEquals($expected, iterator_to_array($model->values()));
    }

    public static function getSuccessData(): array
    {
        return [
            [
                'id',
                '11111111-1111-1111-1111-111111111111',
                null,
                [
                    new CriteriaItem('id', '11111111-1111-1111-1111-111111111111', Condition::eq()),
                ],
            ],
            [
                'id',
                '11111111-1111-1111-1111-111111111111',
                Condition::lt(),
                [
                    new CriteriaItem('id', '11111111-1111-1111-1111-111111111111', Condition::lt()),
                ],
            ],
        ];
    }
}
