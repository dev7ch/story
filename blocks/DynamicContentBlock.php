<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Dynamic Content Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-RC3. 
 */
class DynamicContentBlock extends PhpBlock
{
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
        return 'Dynamic Content';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'filter_frames'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXT],
                 ['var' => 'textMajor', 'label' => 'Major text', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'btnLabel', 'label' => 'Button label', 'type' => self::TYPE_TEXT],
                 ['var' => 'btnLink', 'label' => 'Button link', 'type' => self::TYPE_LINK],
                 ['var' => 'replaceBtnLink', 'label' => 'Button link replacement', 'type' => self::TYPE_TEXT],
                 ['var' => 'blockType', 'label' => 'Block type', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'banner' => 'Banner',
                     'spotlight' => 'Spotlight',
                    ])],
            ],
            'cfgs' => [
                 ['var' => 'style', 'label' => 'Style', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'style1' => 'Style 1',
                     'style2' => 'Style 2',
                     'style3' => 'Style 3',
                     'style4' => 'Style 4',
                     'style5' => 'Style 5',
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
                 ['var' => 'size', 'label' => 'Fullscreen', 'type' => self::TYPE_CHECKBOX, 'initValue' => 1],
                 ['var' => 'orientation', 'label' => 'Orientation', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'orient-left' => 'Left',
                     'orient-center' => 'Center',
                     'orient-right' => 'Right',
                 ])],
                 ['var' => 'contentAlign', 'label' => 'Content Alignment', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'content-align-left' => 'Left',
                     'content-align-center' => 'Center',
                     'content-align-right' => 'Right',
                 ])],
                 ['var' => 'imagePosition', 'label' => 'Image Position', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'image-position-left' => 'Left',
                     'image-position-center' => 'Center',
                     'image-position-right' => 'Right',
                 ])],
                 ['var' => 'transitionContent', 'label' => 'Content Transition', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'onload-content-fade-up' => 'On load fade up',
                     'onload-content-fade-down' => 'On load fade down',
                     'onload-content-fade-right' => 'On load fade right',
                     'onload-content-fade-left' => 'On load fade left',
                     'onload-content-fade-in' => 'On load fade in',
                     'onscroll-content-fade-up' => 'On scroll fade up',
                     'onscroll-content-fade-down' => 'On scroll fade down',
                     'onscroll-content-fade-right' => 'On scroll fade right',
                     'onscroll-content-fade-left' => 'On scroll fade left',
                     'onscroll-content-fade-in' => 'On scroll fade in',


                 ])],
                 ['var' => 'transitionImage', 'label' => 'Image Transition', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'onload-image-fade-up' => 'On load fade up',
                    'onload-image-fade-down' => 'On load fade down',
                    'onload-image-fade-right' => 'On load fade right',
                    'onload-image-fade-left' => 'On load fade left',
                    'onload-image-fade-in' => 'On load fade in',
                    'onscroll-image-fade-up' => 'On scroll fade up',
                    'onscroll-image-fade-down' => 'On scroll fade down',
                    'onscroll-image-fade-right' => 'On scroll fade right',
                    'onscroll-image-fade-left' => 'On scroll fade left',
                    'onscroll-image-fade-in' => 'On scroll fade in',


                ])],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'imageAdmin' => BlockHelper::imageUpload($this->getVarValue('image'), 'thumbnail-small', true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{cfgs.color}}
     * @param {{cfgs.contentAlign}}
     * @param {{cfgs.imagePosition}}
     * @param {{cfgs.orientation}}
     * @param {{cfgs.scheme}}
     * @param {{cfgs.size}}
     * @param {{cfgs.style}}
     * @param {{cfgs.transitionContent}}
     * @param {{cfgs.transitionImage}}
     * @param {{extras.image}}
     * @param {{vars.blockType}}
     * @param {{vars.btnLabel}}
     * @param {{vars.btnLink}}
     * @param {{vars.image}}
     * @param {{vars.replaceBtnLink}}
     * @param {{vars.text}}
     * @param {{vars.title}}
    */
    public function admin()
    {
        return '<h3> {% if vars.title|length %} {{vars.title}} {% else %} Dynamic Content Block {% endif %} </h3><hr> <br />'
            . '{% if vars.blockType|length %} <p><b>Section type:</b> {{vars.blockType}}</p><br />{% endif %}'
            . '{% if vars.textMajor|length %} <p><em>{{vars.textMajor}}</em></p><br />{% endif %}'
            . '{% if vars.text|length %} <p>{{vars.text}}</p><br />{% endif %}'
            . '{% if extras.image|length %} <img src="{{extras.imageAdmin.source}}" /> {% endif %}'
            . '{% if vars.btnLabel|length %} <p><b>Label:</b> {{vars.btnLabel}}</p> {% endif %}'
            . '{% if vars.btnLink|length %} <p><b>Link:</b> {{vars.btnLink.value}}</p> {% endif %}'
            . '{% if cfgs.color|length %} <p><b>Color:</b> {{cfgs.color}}</p> {% endif %}'
            . '{% if cfgs.contentAlign|length %} <p><b>Content align:</b> {{cfgs.contentAlign}}</p> {% endif %}'
            . '{% if cfgs.imagePosition|length %} <p><b>Content align:</b> {{cfgs.imagePosition}}</p> {% endif %}'
            . '{% if cfgs.orientation|length %} <p><b>Orientation:</b> {{cfgs.orientation}}</p> {% endif %}'
            . '{% if cfgs.scheme|length %} <p><b>Scheme:</b> {{cfgs.scheme}}</p> {% endif %}'
            . '{% if cfgs.size|length %} <p><b>Size:</b> {{cfgs.size}}</p> {% endif %}'
            . '{% if cfgs.style|length %} <p><b>Style:</b> {{cfgs.style}}</p> {% endif %}'
            . '{% if cfgs.transitionContent|length %} <p><b>Transition content</b> {{cfgs.ctransitionContent}}</p> {% endif %}'
            . '{% if cfgs.transitionImage|length %} <p><b>Transition image:</b> {{cfgs.transitionImage}}</p> {% endif %}'
            . '<hr>';

    }
}