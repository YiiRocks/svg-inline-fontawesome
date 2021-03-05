<?php

declare(strict_types=1);

use YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome;
use YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesomeInterface;

/* @var array $params */

return [
    SvgInlineFontAwesomeInterface::class => [
        '__construct()' => [
            'registerAssets' => $params['yiirocks/svg-inline-fontawesome']['registerAssets'],
        ],
    ],
];
