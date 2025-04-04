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
        $this->assertStringNotContainsString('fill="currentColor"', $this->svgInline->fai('cookie')->fill(''));
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
}
