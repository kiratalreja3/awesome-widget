<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support\Widget;

use Yii\Html\Helper\Attributes;
use Yii\Widget\AbstractWidget;
use Yii\Widget\Attribute;

final class Widget extends AbstractWidget
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasItems;
    use Attribute\Custom\HasTag;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasAutocomplete;
    use Attribute\HasCols;
    use Attribute\HasCrossorigin;
    use Attribute\HasDownload;
    use Attribute\HasGroup;
    use Attribute\HasHref;
    use Attribute\HasHreflang;
    use Attribute\HasId;
    use Attribute\HasIsmap;
    use Attribute\HasLoading;
    use Attribute\HasPing;
    use Attribute\HasReferrerpolicy;
    use Attribute\HasRel;
    use Attribute\HasRows;
    use Attribute\HasSizes;
    use Attribute\HasSrcset;
    use Attribute\HasTarget;
    use Attribute\HasWrap;

    protected array $attributes = [];
    protected string $template = '';

    public function addAttribute(string $attribute, string $value): self
    {
        $new = clone $this;
        $new->attributes[$attribute] = $value;

        return $new;
    }

    protected function beforeRun(): bool
    {
        if (isset($this->attributes['id']) && $this->attributes['id'] === 'beforerun') {
            return false;
        }

        return parent::beforeRun();
    }

    protected function afterRun(string $result): string
    {
        $result = parent::afterRun($result);

        if (isset($this->attributes['id']) && $this->attributes['id'] === 'afterrun') {
            $result = '<div>' . $result . '</div>';
        }

        return $result;
    }

    protected function run(): string
    {
        $html = '';

        if ($this->tag !== '') {
            $html = $this->tag;
        }

        $html .= trim((new Attributes())->render($this->attributes));

        if ($this->content !== '' && $html !== '') {
            $html .= $this->content . ' ' . $html;
        } elseif ($this->content !== '') {
            $html .= $this->content;
        }

        return '<' . $html . '>';
    }
}
