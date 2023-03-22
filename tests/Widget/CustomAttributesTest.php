<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomAttributesTest extends TestCase
{
    public function testAttributes(): void
    {
        $this->assertSame(
            '<class="text-danger" id="id-test">',
            Widget::widget()->id('id-test')->attributes(['class' => 'text-danger'])->render(),
        );
    }
}
