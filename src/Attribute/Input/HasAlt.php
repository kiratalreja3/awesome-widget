<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute\Input;

/**
 * Is used by widgets which have a alt attribute.
 */
trait HasAlt
{
    /**
     * Returns a new instance specifying the alt attribute, provide the alternative text valid for the image button or
     * img only, displaying the value of the attribute if the image src is missing or otherwise fails to load.
     *
     * @param string $value The alternative text.
     */
    public function alt(string $value): static
    {
        $new = clone $this;
        $new->attributes['alt'] = $value;

        return $new;
    }
}
