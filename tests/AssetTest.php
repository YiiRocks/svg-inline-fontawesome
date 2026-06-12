<?php

declare(strict_types=1);

namespace YiiRocks\SvgInline\FontAwesome\tests;

use YiiRocks\SvgInline\FontAwesome\FontawesomeAsset;
use Yiisoft\Assets\AssetBundle;

final class AssetTest extends TestCase
{
    public function testAssetExtendsAssetBundle(): void
    {
        $asset = new FontawesomeAsset();
        $this->assertInstanceOf(AssetBundle::class, $asset);
    }

    public function testAssetHasCss(): void
    {
        $asset = new FontawesomeAsset();
        $this->assertNotEmpty($asset->css);
    }

    public function testAssetCssContainsSvgWithJs(): void
    {
        $asset = new FontawesomeAsset();
        $this->assertStringContainsString('svg-with-js.min.css', $asset->css[0]);
    }

    public function testAssetResolvesFromContainer(): void
    {
        $asset = $this->container->get(FontawesomeAsset::class);
        $this->assertInstanceOf(FontawesomeAsset::class, $asset);
    }
}
