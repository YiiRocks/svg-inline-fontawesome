<?php

declare(strict_types=1);

namespace YiiRocks\SvgInline\FontAwesome;

use Psr\Container\ContainerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Html\Html;

/**
 * SvgInlineFontAwesome provides a quick and easy way to access Font Awesome Icons.
 */
final class SvgInlineFontAwesome extends \YiiRocks\SvgInline\SvgInline implements SvgInlineFontAwesomeInterface
{
    /** @var string CSS class basename */
    protected string $prefix;

    /** @var string Default style */
    protected string $style;

    /** @var string Path to the Font Awesome Icons folder */
    private string $faIconsFolder;

    /** @var bool `true` for fixed-width class */
    private bool $fixedWidth;

    /** @var FontAwesomeIcon icon properties */
    private FontAwesomeIcon $icon;

    /**
     * Construct
     *
     * @param Aliases $aliases
     * @param AssetManager $assetManager
     * @param ContainerInterface $container
     * @param bool $registerAssets
     */
    public function __construct(
        Aliases $aliases,
        AssetManager $assetManager,
        ContainerInterface $container,
        bool $registerAssets = false
    ) {
        parent::__construct($aliases, $container);

        if ($registerAssets) {
            $assetManager->register([
                FontawesomeAsset::class,
            ]);
        }
    }

    /**
     * Sets the name of the icon.
     *
     * @param string $name  name of the icon
     * @return FontAwesomeIcon component object
     */
    public function name(string $name, ?string $style = null): FontAwesomeIcon
    {
        $this->icon = new FontAwesomeIcon();
        $iconFile = implode(DIRECTORY_SEPARATOR, [$this->faIconsFolder, $style ?? $this->style, "{$name}.svg"]);
        $this->icon->setName($iconFile);

        return $this->icon;
    }

    /**
     * @see $fixedWidth
     * @param bool $value
     * @return void
     */
    public function setFixedWidth(bool $value): void
    {
        $this->fixedWidth = $value;
    }

    /**
     * @see $bootstrapIconsFolder
     * @param string $value
     * @return void
     */
    public function setFontAwesomeIconsFolder(string $value): void
    {
        $this->faIconsFolder = $this->aliases->get($value);
    }

    /**
     * @see $prefix
     * @param string $value
     * @return void
     */
    public function setPrefix(string $value): void
    {
        $this->prefix = $value;
    }

    /**
     * @see $style
     * @param string $value
     * @return void
     */
    public function setStyle(string $value): void
    {
        $this->style = $value;
    }

    /**
     * Prepares either the size class (default) or the width/height if either of these is given manually.
     *
     * @return void
     */
    protected function setSvgSize(): void
    {
        parent::setSvgSize();

        $width = $this->icon->get('width');
        $height = $this->icon->get('height');

        if (!$width && !$height) {
            Html::addCssClass($this->class, $this->prefix);
            $widthClass = $this->icon->get('fixedWidth')
                ? "{$this->prefix}-fw"
                : "{$this->prefix}-w-" . ceil($this->svgWidth / $this->svgHeight * 16);
            Html::addCssClass($this->class, $widthClass);
        }
    }
}
