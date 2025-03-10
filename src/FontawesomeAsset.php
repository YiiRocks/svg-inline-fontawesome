<?php

declare(strict_types=1);

namespace YiiRocks\SvgInline\FontAwesome;

/**
 * Asset bundle for the Font Awesome css files.
 *
 * FontawesomeAsset.
 *
 * @package svg-inline-fontawesome
 */
class FontawesomeAsset extends \Yiisoft\Assets\AssetBundle
{
    public ?string $basePath = '@assets';

    public ?string $baseUrl = '@assetsUrl';

    /** @var array */
    public array $css = [
        'svg-with-js.min.css',
    ];

    /** @var array */
    public array $publishOptions = [
        'only' => [
            'svg-with-js.min.css',
        ],
    ];

    public ?string $sourcePath = '@vendor/fortawesome/font-awesome/css';
}
