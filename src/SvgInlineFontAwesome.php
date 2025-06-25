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
    /** @psalm-suppress PropertyNotSetInConstructor */
    protected string $prefix;

    /** @var string Default style */
    protected ?string $style = null;

    /** @var string Path to the Font Awesome Icons folder */
    /** @psalm-suppress PropertyNotSetInConstructor */
    private string $faIconsFolder;

    /** @var bool `true` for fixed-width class */
    /** @psalm-suppress PropertyNotSetInConstructor */
    private bool $fixedWidth;

    /** @var FontAwesomeIcon icon properties */
    private ?FontAwesomeIcon $icon = null;

    /**
     * Construct
     *
     * @param Aliases $aliases
     * @param AssetManager $assetManager
     * @param ContainerInterface $container
     * @param FontAwesomeIcon $icon
     * @param bool $registerAssets
     */
    public function __construct(
        Aliases $aliases,
        AssetManager $assetManager,
        ContainerInterface $container,
        FontAwesomeIcon $icon,
        bool $registerAssets = false
    ) {
        parent::__construct($aliases, $container, $icon);

        if ($registerAssets) {
            $assetManager->register(
                FontawesomeAsset::class,
            );
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
     * Prepares either the class (default) or the width/height if either of these is given manually.
     *
     * @return void
     */
    #[\Override]
    protected function setSvgSize(): void
    {
        parent::setSvgSize();

        /** @psalm-var FontAwesomeIcon $this->icon */
        $width = $this->icon->get('width');
        $height = $this->icon->get('height');

        if (!$width && !$height) {
            Html::addCssClass($this->class, $this->prefix);
            if ($this->icon->get('fixedWidth')) {
                Html::addCssClass($this->class, "{$this->prefix}-fw");
            }
        }
    }
}
