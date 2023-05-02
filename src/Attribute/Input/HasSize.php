<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute\Input;

/**
 * Is used by widgets which have a size attribute.
 */
trait HasSize
{
    /**
     * Returns a new instance specifying the size attribute valid for email, password, tel, url, and text, specifies how
     * much of the input is shown. Basically creates same result as setting CSS width property with a few specialities.
     *
     * The actual unit of the value depends on the input type. For password and text, it is a number of characters
     * (or em units) with a default value of 20, and for others, it is pixels (or px units).
     *
     * CSS width takes precedence over the size attribute.
     *
     * @param int $value The number of options meant to be shown by the control represented by its element.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-size
     */
    public function size(int $value): static
    {
        $new = clone $this;
        $new->attributes['size'] = $value;

        return $new;
    }
}