<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Gallery Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-RC3. 
 */
class GalleryBlock extends PhpBlock
{
    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;
    
    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Gallery Wrapper';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'view_module'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXT],
                 ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'align', 'label' => 'Text align', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'align-left' => 'Left',
                     'align-center' => 'Center',
                     'align-right' => 'Right',
                 ])],
            ],
            'cfgs' => [
                 ['var' => 'galleryStyle', 'label' => 'Gallery style', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'style1' => 'Style 1',
                     'style2' => 'Style 2',
                     'style3' => 'Style 3',
                 ])],
                 ['var' => 'lightbox', 'label' => 'Disable lightbox', 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'size', 'label' => 'Thumbnail Size', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'small' => 'Small',
                     'medium' => 'Medium',
                     'big' => 'Big',
                 ])],
                ['var' => 'scheme', 'label' => 'Scheme', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    '' => 'Standard',
                    'invert' => 'Inverted',
                ])],
                ['var' => 'color', 'label' => 'Color', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'color1' => 'Color 1',
                    'color2' => 'Color 2',
                    'color3' => 'Color 3',
                    'color4' => 'Color 4',
                    'color5' => 'Color 5',
                    'color6' => 'Color 6',
                    'color7' => 'Color 7',
                ])],
                 ['var' => 'transition', 'label' => 'Transition', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'onload-fade-up' => 'On load fade up',
                     'onload-fade-down' => 'On load fade down',
                     'onload-fade-right' => 'On load fade right',
                     'onload-fade-left' => 'On load fade left',
                     'onload-fade-in' => 'On load fade in',
                     'onscroll-fade-up' => 'On scroll fade up',
                     'onscroll-fade-down' => 'On scroll fade down',
                     'onscroll-fade-right' => 'On scroll fade right',
                     'onscroll-fade-left' => 'On scroll fade left',
                     'onscroll-fade-in' => 'On scroll fade in',
                 ])],
            ],
            'placeholders' => [
                 ['var' => 'galleryItem', 'label' => 'Gallery Item'],
            ],
        ];
    }
    
    /**
     * {@inheritDoc} 
     *
     * @param {{cfgs.galleryStyle}}
     * @param {{cfgs.lightbox}}
     * @param {{cfgs.size}}
     * @param {{cfgs.transition}}
     * @param {{placeholders.galleryItem}}
     * @param {{vars.align}}
     * @param {{vars.style}}
     * @param {{vars.text}}
     * @param {{vars.title}}
    */
    public function admin()
    {
        return '<h3> {% if vars.title|length %} {{vars.title}} {% else %} Gallery Block {% endif %} </h3><hr> <br />'
            . '{% if vars.text|length %} <p>{{vars.text}}</p><br />{% endif %}'
            . '{% if vars.align|length %} <p><b>Text align:</b> {{vars.align}}</p> {% endif %}'
            . '{% if vars.btnLink|length %} <p><b>Link:</b> {{vars.btnLink.value}}</p> {% endif %}'
            . '{% if cfgs.lightbox|length %} <p>Lightbox is enabled</p>{% endif %}'
            . '{% if cfgs.galleryStyle|length %} <p><b>Gallery style:</b> {{cfgs.galleryStyle}}</p> {% endif %}'
            . '{% if cfgs.transition|length %} <p><b>Transition:</b> {{cfgs.transition}}</p> {% endif %}'
            . '{% if cfgs.size|length %} <p><b>Thumbnail size:</b> {{cfgs.size}}</p> {% endif %}'
            . '<hr>';
    }
}