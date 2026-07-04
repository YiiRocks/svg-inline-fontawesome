<?php

namespace YiiRocks\SvgInline\FontAwesome\tests;

class SvgInlineFontAwesomeTest extends TestCase
{
    public function testBasic(): void
    {
        $this->assertStringContainsString('role="img" class="svg-inline--fa"', $this->svgInline->fai('cookie'));
        $this->assertStringContainsString('role="img" class="svg-inline--fa"', $this->svgInline->fai('nonexistent'));
    }

    public function testClass(): void
    {
        $this->assertStringContainsString('class="yourClass svg-inline--fa"', $this->svgInline->fai('cookie')->class('yourClass'));
    }

    public function testCss(): void
    {
        $this->assertStringContainsString('style="text-align: center;"', $this->svgInline->fai('cookie')->css(['text-align' => 'center']));
    }

    public function testFill(): void
    {
        $this->assertStringContainsString('fill="currentColor"', $this->svgInline->fai('cookie'));
        $this->assertStringNotContainsString('class="svg-inline--fa" fill="currentColor">', $this->svgInline->fai('cookie')->fill(''));
        $this->assertStringContainsString('fill="#003865"', $this->svgInline->fai('cookie')->fill('#003865'));
    }

    public function testFixedWidth(): void
    {
        $this->assertStringNotContainsString('svg-inline--fa-fw', $this->svgInline->fai('cookie'));
        $this->assertStringContainsString('class="svg-inline--fa svg-inline--fa-fw"', $this->svgInline->fai('cookie')->fixedWidth(true));
    }

    public function testHeight(): void
    {
        $this->assertStringNotContainsString('svg-inline--fa"', $this->svgInline->fai('cookie')->height(42));
        $this->assertStringNotContainsString('svg-inline--fa-fw"', $this->svgInline->fai('cookie')->height(42));
        $this->assertStringContainsString('width="42" height="42"', $this->svgInline->fai('cookie')->height(42));
    }

    public function testExplicitStyleOverridesDefaultStyle(): void
    {
        // "galactic-republic" only exists under the "brands" style, not the configured default
        // ("solid"), so if the explicit style argument were ignored, this would fall back to the
        // fallback icon instead, which has a different viewBox. The <title> alone can't tell these
        // apart, since it is derived from the requested icon name regardless of which file loaded.
        $this->assertStringContainsString(
            'viewBox="0 0 512 512"',
            $this->svgInline->fai('galactic-republic', 'brands')
        );
    }

    public function testReset(): void
    {
        $firstRun = $this->svgInline->fai('cookie')->class('yourClass')->render();
        $secondRun = $this->svgInline->fai('cookie')->render();

        $this->assertNotEquals($firstRun, $secondRun);
    }

    public function testTitle(): void
    {
        $this->assertStringContainsString('<title>Demo Title</title>', $this->svgInline->fai('cookie')->title('Demo Title'));
    }

    public function testWidth(): void
    {
        $this->assertStringNotContainsString('svg-inline--fa"', $this->svgInline->fai('cookie')->width(42));
        $this->assertStringNotContainsString('svg-inline--fa-fw"', $this->svgInline->fai('cookie')->width(42));
        $this->assertStringContainsString('width="42" height="42"', $this->svgInline->fai('cookie')->width(42));
    }

    public function testFontAwesomeIconDirectInstantiation(): void
    {
        $icon = new \YiiRocks\SvgInline\FontAwesome\FontAwesomeIcon();
        $icon->setName('test');
        $this->assertSame('test', $icon->get('name'));
    }

    public function testFontAwesomeIconFixedWidthSetter(): void
    {
        $icon = new \YiiRocks\SvgInline\FontAwesome\FontAwesomeIcon();
        $icon->setFixedWidth(true);
        $this->assertTrue($icon->get('fixedWidth'));
    }

    public function testNameIsPubliclyAccessible(): void
    {
        /** @var \YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome $fai */
        $fai = $this->container->get(\YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesomeInterface::class);
        $icon = $fai->name('cookie');
        $this->assertInstanceOf(\YiiRocks\SvgInline\FontAwesome\FontAwesomeIcon::class, $icon);
    }

    public function testRegisterAssetsDefaultsToFalse(): void
    {
        $assetManager = $this->container->get(\Yiisoft\Assets\AssetManager::class);
        new \YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome(
            $this->aliases,
            $assetManager,
            $this->container,
            new \YiiRocks\SvgInline\FontAwesome\FontAwesomeIcon()
        );
        $this->assertFalse(
            $assetManager->isRegisteredBundle(\YiiRocks\SvgInline\FontAwesome\FontawesomeAsset::class)
        );
    }

    public function testRegisterAssetsFalseDoesNotRegisterFontawesomeAsset(): void
    {
        $assetManager = $this->container->get(\Yiisoft\Assets\AssetManager::class);
        new \YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome(
            $this->aliases,
            $assetManager,
            $this->container,
            new \YiiRocks\SvgInline\FontAwesome\FontAwesomeIcon(),
            false
        );
        $this->assertFalse(
            $assetManager->isRegisteredBundle(\YiiRocks\SvgInline\FontAwesome\FontawesomeAsset::class)
        );
    }

    public function testRegisterAssetsTrueRegistersFontawesomeAsset(): void
    {
        $assetManager = $this->container->get(\Yiisoft\Assets\AssetManager::class);
        new \YiiRocks\SvgInline\FontAwesome\SvgInlineFontAwesome(
            $this->aliases,
            $assetManager,
            $this->container,
            new \YiiRocks\SvgInline\FontAwesome\FontAwesomeIcon(),
            true
        );
        $this->assertTrue(
            $assetManager->isRegisteredBundle(\YiiRocks\SvgInline\FontAwesome\FontawesomeAsset::class)
        );
    }
}
