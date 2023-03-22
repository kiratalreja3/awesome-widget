<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class BeginEndTest extends TestCase
{
    public function testRender(): void
    {
        Widget::widget()->id('test')->begin();

        $output = Widget::end();

        $this->assertSame('<id="test">', $output);
    }
}
