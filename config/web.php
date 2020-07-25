<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome;
use YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesomeInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;

/* @var array $params */

return [
    SvgInlineFontAwesomeInterface::class => static function (ContainerInterface $container) use ($params) {
        $fai = new SvgInlineFontAwesome($container->get(Aliases::class), $container);
        $fai->setFallbackIcon($params['yiirocks/svg-inline-fontawesome']['fallbackIcon']);
        $fai->setFill($params['yiirocks/svg-inline-fontawesome']['fill']);
        $fai->setFixedWidth($params['yiirocks/svg-inline-fontawesome']['fixedWidth']);
        $fai->setFontAwesomeIconsFolder($params['yiirocks/svg-inline-fontawesome']['fontAwesomeFolder']);
        $fai->setPrefix($params['yiirocks/svg-inline-fontawesome']['prefix']);
        $fai->setStyle($params['yiirocks/svg-inline-fontawesome']['style']);

        if ($params['yiirocks/svg-inline-fontawesome']['registerAssets'] === true) {
            $fai->registerAssets($container->get(AssetManager::class));
        }

        return $fai;
    },
];
