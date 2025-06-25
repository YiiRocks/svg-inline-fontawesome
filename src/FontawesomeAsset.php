<?php

declare(strict_types=1);

namespace YiiRocks\SvgInline\FontAwesome;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Assets\AssetManager;
/**
 * Asset bundle for the Font Awesome css files.
 *
 * FontawesomeAsset.
 *
 * @package svg-inline-fontawesome
 * 
 * @psalm-import-type CssFile from AssetManager
 */
final class FontawesomeAsset extends AssetBundle
{
    public ?string $basePath = '@assets';

    public ?string $baseUrl = '@assetsUrl';

    /** @var array */
    /** @psalm-var array<array-key, CssFile|string> */
    public array $css = [
        'svg-with-js.min.css',
    ];

    /** @var array */
    /** @psalm-suppress NonInvariantDocblockPropertyType */
    public array $publishOptions = [
        'only' => [
            'svg-with-js.min.css',
        ],
    ];

    public ?string $sourcePath = '@vendor/fortawesome/font-awesome/css';
}
