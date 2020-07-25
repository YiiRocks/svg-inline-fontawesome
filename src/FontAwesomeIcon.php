<?php

declare(strict_types=1);

namespace YiiRocks\SvgInline\FontAwesome;

/**
 * Icon class to store all icon properties.
 */
final class FontAwesomeIcon extends \YiiRocks\SvgInline\Icon
{
    /** @var bool Set to `true` to have a fixed width icon */
    protected bool $fixedWidth;

    /**
     * @var string Style of the icon, must match `name` for Font Awesome icons.
     */
    private string $style;

    public function setFixedWidth(bool $value): void
    {
        $this->fixedWidth = $value;
    }
}
