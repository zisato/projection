<?php

namespace Zisato\Projection\Tests\Unit\ValueObject;

use PHPUnit\Framework\TestCase;
use Zisato\Projection\Tests\Stub\ValueObject\PhpUnitProjectionModel;

class ProjectionModelTest extends TestCase
{
    public function testCreateSuccessfully()
    {
        $data = [
            'foo' => [
                'bar' => 'doe',
            ]
        ];
        $model = PhpUnitProjectionModel::fromData($data);

        static::assertEquals($data, $model->data());
    }

    public function testChangeDataSuccessfully()
    {
        $model = PhpUnitProjectionModel::fromData([
            'foo' => [
                'bar' => 'doe',
            ]
        ]);

        $newData = [
            'doe' => [
                'foo' => 'bar',
            ]
        ];
        $model->changeData($newData);

        static::assertEquals($newData, $model->data());
    }
}
