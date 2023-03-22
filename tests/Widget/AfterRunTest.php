<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AfterRunTest extends TestCase
{
    public function testRender(): void
    {
        $this->assertSame('<div><id="afterrun"></div>', Widget::widget()->id('afterrun')->render());
    }
}
