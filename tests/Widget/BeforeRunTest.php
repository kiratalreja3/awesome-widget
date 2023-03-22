<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class BeforeRunTest extends TestCase
{
    public function testBeforeRun(): void
    {
        $this->assertEmpty(Widget::widget()->id('beforerun')->render());
    }

    public function testRender(): void
    {
        $this->assertSame('<>', Widget::widget()->render());
    }
}
