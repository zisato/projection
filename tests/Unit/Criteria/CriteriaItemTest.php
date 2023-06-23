<?php

namespace Zisato\Projection\Tests\Unit\Criteria;

use Zisato\Projection\Criteria\Condition;
use Zisato\Projection\Criteria\CriteriaItem;
use PHPUnit\Framework\TestCase;

class CriteriaItemTest extends TestCase
{
    /**
     * @dataProvider getSuccessData
     */
    public function testCreateSuccessfully(string $column, $value, Condition $condition)
    {
        $model = new CriteriaItem($column, $value, $condition);

        static::assertEquals($column, $model->column());
        static::assertEquals($value, $model->value());
        static::assertEquals($condition, $model->condition());
    }

    public static function getSuccessData(): array
    {
        return [
            [
                'id',
                '11111111-1111-1111-1111-111111111111',
                Condition::eq(),
            ],
            [
                'id',
                '11111111-1111-1111-1111-111111111111',
                Condition::lt(),
            ],
        ];
    }
}
