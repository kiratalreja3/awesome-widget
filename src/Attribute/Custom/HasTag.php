<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute\Custom;

use InvalidArgumentException;

/**
 * Is used by widgets which have a tag name, for example 'div', 'span', 'a', etc.
 */
trait HasTag
{
    private string $tag = '';

    /**
     * Returns a new instance specifying the tag name of the widget.
     *
     * @param string $value The tag name.
     */
    public function tag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('Tag name cannot be empty.');
        }

        $new = clone $this;
        $new->tag = $value;

        return $new;
    }
}
