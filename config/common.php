<?php

declare(strict_types=1);

use YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome;
use YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesomeInterface;

/* @var array $params */

return [
    SvgInlineFontAwesomeInterface::class => [
        '__class' => SvgInlineFontAwesome::class,
        'setFallbackIcon()' => [$params['yiirocks/svg-inline-fontawesome']['fallbackIcon']],
        'setFill()' => [$params['yiirocks/svg-inline-fontawesome']['fill']],
        'setFixedWidth()' => [$params['yiirocks/svg-inline-fontawesome']['fixedWidth']],
        'setFontAwesomeIconsFolder()' => [$params['yiirocks/svg-inline-fontawesome']['fontAwesomeFolder']],
        'setPrefix()' => [$params['yiirocks/svg-inline-fontawesome']['prefix']],
        'setStyle()' => [$params['yiirocks/svg-inline-fontawesome']['style']],
    ],
];
