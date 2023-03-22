<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use RuntimeException;
use Yii\Widget\Tests\Support\Widget\InputWidget;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testAutocomplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Autocomplete must be "on" or "off".');

        Widget::widget()->autocomplete('')->render();
    }

    public function testCrossorigin(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid crossOrigin value.');

        Widget::widget()->crossorigin('invalid-value');
    }

    public function testFile(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('File /path/to/file does not exist.');

        Widget::widget(file: '/path/to/file');
    }

    public function testLoading(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The loading attribute value must be one of "eager", "lazy".');

        Widget::widget()->loading('invalid-value');
    }

    public function testReferrerpolicy(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The referrerpolicy attribute value must be one of "no-referrer", "no-referrer-when-downgrade", "origin", "origin-when-cross-origin", "same-origin", "strict-origin", "strict-origin-when-cross-origin", "unsafe-url".'
        );

        Widget::widget()->referrerpolicy('invalid-value');
    }

    public function testReferrerpolicyWithEmptyValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The referrerpolicy attribute value must be one of "no-referrer", "no-referrer-when-downgrade", "origin", "origin-when-cross-origin", "same-origin", "strict-origin", "strict-origin-when-cross-origin", "unsafe-url".'
        );

        Widget::widget()->referrerpolicy('');
    }

    public function testRel(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The rel attribute value must be one of "alternate", "author", "bookmark", "help", "icon", "license", "next", "nofollow", "noreferrer", "pingback", "preconnect", "prefetch", "preload", "prerender", "prev", "search", "sidebar", "stylesheet", "tag".'
        );

        Widget::widget()->rel('invalid-value');
    }

    public function testStackTracking(): void
    {
        $widget = Widget::widget();

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'Unexpected Yii\Widget\Tests\Support\Widget\Widget::end() call. A matching begin() is not found.'
        );

        $widget::end();
    }

    public function testStackTrackingWithDiferentClass(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'Expecting end() of Yii\Widget\Tests\Support\Widget\Widget found Yii\Widget\Tests\Support\Widget\InputWidget.'
        );

        Widget::widget()->begin();
        InputWidget::end();
    }

    public function testTarget(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The target attribute value must be one of "_blank", "_self", "_parent", "_top".'
        );

        Widget::widget()->target('invalid-value')->render();
    }

    public function testWrap(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid wrap value. Valid values are: hard, soft.');

        Widget::widget()->wrap('')->render();
    }
}
