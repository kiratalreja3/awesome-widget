<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support\Widget;

use Yii\Html\Tag;
use Yii\Widget\AbstractInputWidget;
use Yii\Widget\Attribute;

final class InputWidget extends AbstractInputWidget
{
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\HasPrompt;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeMultiple;
    use Attribute\Input\HasAccept;
    use Attribute\Input\HasAlt;
    use Attribute\Input\HasDirname;
    use Attribute\Input\HasHeight;
    use Attribute\Input\HasMax;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMin;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPattern;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Input\HasSize;
    use Attribute\Input\HasSrc;
    use Attribute\Input\HasStep;
    use Attribute\Input\HasType;
    use Attribute\Input\HasWidth;

    private string $tag = 'input';

    /**
     * Returns a new instance with the specified tag name.
     *
     * @param string $value The tag name.
     */
    public function tag(string $value): self
    {
        $new = clone $this;
        $new->tag = $value;

        return $new;
    }

    protected function run(): string
    {
        $attributes = $this->attributes;
        $content = '';
        $type = 'text';
        $label = '';

        if ($this->getPlaceholder() !== '') {
            $attributes['placeholder'] = $this->getPlaceholder();
        }

        if (!empty($this->getValue())) {
            /** @psalm-var mixed */
            $attributes['value'] = $this->getValue();
        }

        if (array_key_exists('type', $attributes)) {
            $type = $attributes['type'];

            unset($attributes['type']);
        }

        if ($this->prompt !== '') {
            $content .= PHP_EOL . $this->prompt . PHP_EOL;
        }

        if ($this->label !== null && $this->label !== '') {
            $label = Tag::create('label', $this->label, $this->labelAttributes) . PHP_EOL;
        }

        $renderInput = $label . $this->renderInput($this->tag, $content, $type, $attributes);

        return match ($this->container) {
            true => Tag::create('div', $renderInput, $this->containerAttributes),
            false => $renderInput,
        };
    }
}
