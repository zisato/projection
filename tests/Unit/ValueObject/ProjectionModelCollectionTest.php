<?php

namespace Zisato\Projection\Tests\Unit\ValueObject;

use Zisato\Projection\Tests\Stub\ValueObject\PhpUnitProjectionModel;
use Zisato\Projection\ValueObject\ProjectionModelCollection;
use PHPUnit\Framework\TestCase;

class ProjectionModelCollectionTest extends TestCase
{
    /**
     * @dataProvider getCreateData
     */
    public function testCreateSuccessfully(int $total, array $data, int $expectedCount): void
    {
        $model = ProjectionModelCollection::create($total, $data);

        static::assertEquals($data, iterator_to_array($model->data()));
        static::assertEquals($total, $model->total());
        static::assertEquals($expectedCount, $model->count());
    }

    public function testAddSuccessfully()
    {
        $total = 10;
        $count = 2;
        $data = [
            $projection1 = PhpUnitProjectionModel::fromData(['foo' => 'bar']),
            $projection2 = PhpUnitProjectionModel::fromData(['doe' => 'noe']),
        ];
        $model = ProjectionModelCollection::create($total);
        $model->add($projection1);
        $model->add($projection2);

        static::assertEquals($data, iterator_to_array($model->data()));
        static::assertEquals($total, $model->total());
        static::assertEquals($count, $model->count());
    }

    public static function getCreateData(): array
    {
        return [
            [
                0,
                [],
                0,
            ],
            [
                10,
                [
                    PhpUnitProjectionModel::fromData(['foo' => 'bar']),
                    PhpUnitProjectionModel::fromData(['doe' => 'noe']),
                ],
                2,
            ],
        ];
    }
}
